/*!
 * 
 * Super simple WYSIWYG editor v0.8.20
 * https://summernote.org
 *
 *
 * Copyright 2013- Alan Hong and contributors
 * Summernote may be freely distributed under the MIT license.
 *
 * Date: 2021-10-14T21:15Z
 *
 */
(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else {
		var a = factory();
		for(var i in a) (typeof exports === 'object' ? exports : root)[i] = a[i];
	}
})(self, function() {
return /******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
(function ($) {
  $.extend($.summernote.lang, {
    'fa-IR': {
      font: {
        bold: 'درشت',
        italic: 'خمیده',
        underline: 'میان خط',
        clear: 'پاک کردن فرمت فونت',
        height: 'فاصله ی خطی',
        name: 'اسم فونت',
        strikethrough: 'Strike',
        subscript: 'Subscript',
        superscript: 'Superscript',
        size: 'اندازه ی فونت'
      },
      image: {
        image: 'تصویر',
        insert: 'وارد کردن تصویر',
        resizeFull: 'تغییر به اندازه ی کامل',
        resizeHalf: 'تغییر به اندازه نصف',
        resizeQuarter: 'تغییر به اندازه یک چهارم',
        floatLeft: 'چسباندن به چپ',
        floatRight: 'چسباندن به راست',
        floatNone: 'بدون چسبندگی',
        shapeRounded: 'Shape: Rounded',
        shapeCircle: 'Shape: Circle',
        shapeThumbnail: 'Shape: Thumbnail',
        shapeNone: 'Shape: None',
        dragImageHere: 'یک تصویر را اینجا بکشید',
        dropImage: 'Drop image or Text',
        selectFromFiles: 'فایل ها را انتخاب کنید',
        maximumFileSize: 'حداکثر اندازه پرونده',
        maximumFileSizeError: 'Maximum file size exceeded.',
        url: 'آدرس تصویر',
        remove: 'حذف تصویر',
        original: 'Original'
      },
      video: {
        video: 'ویدیو',
        videoLink: 'لینک ویدیو',
        insert: 'افزودن ویدیو',
        url: 'آدرس ویدیو ؟',
        provide