/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/admin/js/trashedvideo.js":
/*!********************************************!*\
  !*** ./resources/admin/js/trashedvideo.js ***!
  \********************************************/
/***/ (() => {

eval("// $.ajaxSetup({\n//     headers: {\n//         'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n//     }\n// });\n$(document).on('click', '#restore', function () {\n  var id = $(this).val();\n  $.ajax({\n    headers: {\n      'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n    },\n    url: \"/video/restore/record\",\n    dataType: \"json\",\n    type: \"post\",\n    data: {\n      id: id\n    },\n    success: function success(response) {\n      if (response.status == 200) {\n        window.LaravelDataTables['videodatatable-table'].draw();\n      }\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYWRtaW4vanMvdHJhc2hlZHZpZGVvLmpzLmpzIiwibmFtZXMiOlsiJCIsImRvY3VtZW50Iiwib24iLCJpZCIsInZhbCIsImFqYXgiLCJoZWFkZXJzIiwiYXR0ciIsInVybCIsImRhdGFUeXBlIiwidHlwZSIsImRhdGEiLCJzdWNjZXNzIiwicmVzcG9uc2UiLCJzdGF0dXMiLCJ3aW5kb3ciLCJMYXJhdmVsRGF0YVRhYmxlcyIsImRyYXciXSwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hZG1pbi9qcy90cmFzaGVkdmlkZW8uanM/NGQ0ZiJdLCJzb3VyY2VzQ29udGVudCI6WyIvLyAkLmFqYXhTZXR1cCh7XHJcbi8vICAgICBoZWFkZXJzOiB7XHJcbi8vICAgICAgICAgJ1gtQ1NSRi1UT0tFTic6ICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JylcclxuLy8gICAgIH1cclxuLy8gfSk7XHJcblxyXG5cclxuJChkb2N1bWVudCkub24oJ2NsaWNrJywnI3Jlc3RvcmUnLGZ1bmN0aW9uKCl7XHJcbiAgICB2YXIgaWQ9ICQodGhpcykudmFsKCk7XHJcbiAgICAkLmFqYXgoe1xyXG4gICAgICAgIGhlYWRlcnM6IHtcclxuICAgICAgICAgICAgJ1gtQ1NSRi1UT0tFTic6ICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JylcclxuICAgICAgICB9LFxyXG4gICAgICAgIHVybDpcIi92aWRlby9yZXN0b3JlL3JlY29yZFwiLFxyXG4gICAgICAgIGRhdGFUeXBlOlwianNvblwiLFxyXG4gICAgICAgIHR5cGU6XCJwb3N0XCIsXHJcbiAgICAgICAgZGF0YTp7aWQ6aWR9LFxyXG4gICAgICAgIHN1Y2Nlc3M6ZnVuY3Rpb24ocmVzcG9uc2Upe1xyXG4gICAgICAgICAgICBpZihyZXNwb25zZS5zdGF0dXMgPT0gMjAwKVxyXG4gICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICB3aW5kb3cuTGFyYXZlbERhdGFUYWJsZXNbJ3ZpZGVvZGF0YXRhYmxlLXRhYmxlJ10uZHJhdygpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcbn0pO1xyXG4iXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFHQUEsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsRUFBWixDQUFlLE9BQWYsRUFBdUIsVUFBdkIsRUFBa0MsWUFBVTtFQUN4QyxJQUFJQyxFQUFFLEdBQUVILENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUksR0FBUixFQUFSO0VBQ0FKLENBQUMsQ0FBQ0ssSUFBRixDQUFPO0lBQ0hDLE9BQU8sRUFBRTtNQUNMLGdCQUFnQk4sQ0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJPLElBQTdCLENBQWtDLFNBQWxDO0lBRFgsQ0FETjtJQUlIQyxHQUFHLEVBQUMsdUJBSkQ7SUFLSEMsUUFBUSxFQUFDLE1BTE47SUFNSEMsSUFBSSxFQUFDLE1BTkY7SUFPSEMsSUFBSSxFQUFDO01BQUNSLEVBQUUsRUFBQ0E7SUFBSixDQVBGO0lBUUhTLE9BQU8sRUFBQyxpQkFBU0MsUUFBVCxFQUFrQjtNQUN0QixJQUFHQSxRQUFRLENBQUNDLE1BQVQsSUFBbUIsR0FBdEIsRUFDQTtRQUNJQyxNQUFNLENBQUNDLGlCQUFQLENBQXlCLHNCQUF6QixFQUFpREMsSUFBakQ7TUFDSDtJQUNKO0VBYkUsQ0FBUDtBQWVILENBakJEIn0=\n//# sourceURL=webpack-internal:///./resources/admin/js/trashedvideo.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/admin/js/trashedvideo.js"]();
/******/ 	
/******/ })()
;