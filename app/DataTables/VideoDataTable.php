<?php

namespace App\DataTables;

use App\Models\Video;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;


class VideoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('status', static function ($videos) {
                return "<button id='status' type='button' value='".$videos->id."' data-status='".$videos->status."' class='badge badge-".($videos->status==0?'danger':'success')."'>".($videos->status==0?'Deactive':'Active')."</button>";
            })
            ->addColumn('action', static function ($videos) {
                return "<button type='button' value='".$videos->id."' class='btn btn-primary' id='edit' data-toggle='modal' data-target='#myModal'>Edit</button><button class='btn btn-danger' value='".$videos->id."' id='trash'>Trash</button>";
            })
            ->editColumn('video',static function ($videos){
                return '<img id="img" src="'.asset("/upload/videoimg.webp").'" value-id="'.$videos->id.'" height="100px" width="100px">';
            })
            ->rawColumns(['status', 'action','video']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\VideoDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Video $model,Request $request)
    {      
        if($request->daterange != '')
        {
            $date = explode(' - ',$request->daterange);          
            $model = $model->whereBetween('published_at',[$date[0],$date[1]]);          
        }      
        return $model->with('category')->newQuery();
     }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('videodatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
                    
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
            Column::make('id'),
            Column::make('title'),
            Column::make('video'),
            Column::make('published_at'),
            Column::make('link'),
            Column::make('description'),
            Column::make('hashtags'),
            Column::make('slug'),
            Column::make('category.name')->title('Category Name'),
            Column::make('status'),
            Column::make('action')->title('Action'),
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Video_' . date('YmdHis');
    }
}
