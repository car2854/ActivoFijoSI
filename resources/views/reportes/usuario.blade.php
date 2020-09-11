<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	<title>Reporte Usuario</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>



        @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900');
/*
    Template: Admin Board
    Author: Saiful
    Developer by: Saiful Islam

    Table of Content
    ================

1. variable
2. fonts
3. card
4. global
5. badge
6. tab
7. modal
8. timeline
9. data-table
10. panel
11. button
12. header
13. gmap
14. chat
15. carousel
16. weather
17. invoice-edit
18. invoice
19. widget-stat
20. recent-comments
21. recent-message
22. forms
23. compose-email
24. progress-bar
25. todo-list
26. datamap
27. table
28. order-progress
29. login
30. chart
31. nestable
32. profile
33. profile-widget
34. ui-element-basic
35. calendar
36. flot-chart
37. morris-chart
38. products_1
39. products_2
40. products_3
41. favourite_menu
42. order-list
43. booking-system
44. scrollable
45. vector-map
46. menu-upload
47. social-media-stats
48. vertical-carousel
49. chartist
50. table-export
51. ui-widget-v1
42. responsive

*/
/*    Font Variable
----------------------*/
/*    Color Variable
-----------------------*/
/*    Solid Color
------------------*/
/*    Brand color
----------------------*/
/*----------------font-------------------*/
.icon-name {
  color: #000;
}
/*  Opensans
--------------- */
.card-body {
  padding: 0;
}
.card {
  background: #ffffff;
  margin: 7.5px 0;
  padding: 20px;
  border: 1px solid #e7e7e7;
  border-radius: 3px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}
.card-subtitle {
  font-size: 12px;
  margin: 10px 0;
}
.card-title {
  font-weight: 400;
  font-size: 18px;
  margin: 0;
}
.card-title h4 {
  display: inline-block;
  font-weight: 400;
  font-size: 18px;
}
.card-title p {
  font-family: 'Roboto', sans-serif;
  margin-bottom: 12px;
}
.card-header-right-icon {
  display: inline-block;
  float: right;
}
.card-header-right-icon li {
  float: right;
  padding-left: 14px;
  color: #868e96;
  cursor: pointer;
  vertical-align: middle;
  transition: all 0.5s ease-in-out;
  display: inline-block;
}
.card-header-right-icon li .ti-close {
  font-size: 12px;
}
.card-option {
  position: relative;
}
.card-option-dropdown {
  display: none;
  left: auto;
  right: 0;
}
.card-option-dropdown li {
  display: block;
  float: left;
  width: 100%;
  padding: 0;
}
.card-option-dropdown li a {
  line-height: 25px;
  font-size: 12px;
}
.card-option-dropdown li a i {
  margin-right: 10px;
}
.doc-link {
  float: right;
  position: relative;
  transition: all 0.5s ease-in-out;
}
.doc-link:focus:after,
.doc-link:hover:after {
  opacity: 1;
  visibility: visible;
}
.doc-link:after {
  border: 1px solid #e7e7e7;
  border-radius: 5px;
  content: "Documentation";
  font-size: 12px;
  padding: 5px 10px;
  position: absolute;
  right: -30px;
  top: -30px;
  opacity: 0;
  visibility: hidden;
  transition: all 0.5s ease-in-out;
}
.badge {
  padding: 5px 10px;
  font-weight: 400;
  border-radius: 4px;
}
.badge-primary {
  background: #5873fe;
  color: #ffffff;
}
.badge-success {
  background: #28a745;
  color: #ffffff;
}
.badge-info {
  background: #03a9f4;
  color: #ffffff;
}
.badge-warning {
  background: #e7b63a;
  color: #ffffff;
}
.badge-danger {
  background: #dc3545;
  color: #ffffff;
}
.badge-pink {
  background: #e6a1f2;
  color: #ffffff;
}
.badge-dark {
  background: #545454;
  color: #ffffff;
}
span.badge {
  color: #ffffff;
  font-size: 14px;
}
.vtabs {
  display: table;
}
.vtabs .tabs-vertical {
  border-bottom: 0 none;
  border-right: 1px solid rgba(120, 130, 140, 0.13);
  display: table-cell;
  vertical-align: top;
  width: 150px;
}
.vtabs .tabs-vertical li .nav-link {
  border: 0 none;
  border-radius: 4px 0 0 4px;
  color: #263238;
  margin-bottom: 10px;
}
.vtabs .tab-content {
  display: table-cell;
  padding: 20px;
  vertical-align: top;
}
.tabs-vertical li .nav-link.active,
.tabs-vertical li .nav-link.active:focus,
.tabs-vertical li .nav-link:hover {
  background: #1976d2 none repeat scroll 0 0;
  border: 0 none;
  color: #ffffff;
}
.customvtab .tabs-vertical li .nav-link.active,
.customvtab .tabs-vertical li .nav-link:focus,
.customvtab .tabs-vertical li .nav-link:hover {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background: #ffffff none repeat scroll 0 0;
  border-color: currentcolor #1976d2 currentcolor currentcolor;
  border-image: none;
  border-style: none solid none none;
  border-width: 0 2px 0 0;
  color: #1976d2;
  margin-right: -1px;
}
.tabcontent-border {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  border-color: currentcolor #ddd #ddd;
  border-image: none;
  border-style: none solid solid;
  border-width: 0 1px 1px;
}
.customtab2 li a.nav-link {
  border: 0 none;
  color: #67757c;
  margin-right: 3px;
}
.customtab2 li a.nav-link.active {
  background: #1976d2 none repeat scroll 0 0;
  color: #ffffff;
}
.customtab2 li a.nav-link:hover {
  background: #1976d2 none repeat scroll 0 0;
  color: #ffffff;
}
.modal-dialog {
  margin: 30px auto;
  position: relative;
  top: 50%;
  transform: translateY(-50%) !important;
  width: 70%;
}
.modal-header .close {
  font-size: 14px;
  margin-right: 15px;
  margin-top: 5px;
}
.modal-content {
  border-radius: 3px;
}
.timeline {
  list-style: none;
  padding: 0 0 8px;
  position: relative;
}
.timeline:before {
  top: 7px;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 3px;
  background-color: #e7e7e7;
  left: 25px;
  margin-right: -1.5px;
}
.timeline-title {
  margin: 5px 0 !important;
  font-size: 14px;
}
.timeline > li {
  margin-bottom: 15px;
  position: relative;
}
.timeline > li:after,
.timeline > li:before {
  content: " ";
  display: table;
}
.timeline > li:after {
  clear: both;
}
.timeline > li > .timeline-panel {
  width: calc(100% - 70px);
  float: right;
  border: 1px solid #e7e7e7;
  border-radius: 2px;
  padding: 5px 20px;
  position: relative;
}
.timeline > li > .timeline-panel:before {
  position: absolute;
  top: 26px;
  left: -15px;
  display: inline-block;
  border-top: 15px solid transparent;
  border-right: 15px solid #e7e7e7;
  border-left: 0 solid #e7e7e7;
  border-bottom: 15px solid transparent;
  content: " ";
}
.timeline > li > .timeline-panel:after {
  position: absolute;
  top: 27px;
  left: -14px;
  display: inline-block;
  border-top: 14px solid transparent;
  border-right: 14px solid #ffffff;
  border-left: 0 solid #ffffff;
  border-bottom: 14px solid transparent;
  content: " ";
}
.timeline > li > .timeline-badge {
  color: #ffffff;
  width: 35px;
  height: 35px;
  line-height: 35px;
  font-size: 1.4em;
  text-align: center;
  position: absolute;
  top: 25px;
  left: 8px;
  margin-right: -25px;
  background-color: #e6a1f2;
  z-index: 100;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
}
.timeline-body > p {
  font-size: 12px;
  margin-bottom: 10px;
}
.timeline-badge.primary {
  background-color: #5873fe !important;
}
.timeline-badge.success {
  background-color: #28a745 !important;
}
.timeline-badge.warning {
  background-color: #e7b63a !important;
}
.timeline-badge.danger {
  background-color: #dc3545 !important;
}
.timeline-badge.info {
  background-color: #03a9f4 !important;
}
.bootstrap-data-table-panel .dataTables_filter {
  text-align: right;
}
.bootstrap-data-table-panel .dataTables_filter .form-control {
  margin-left: 10px;
}
.bootstrap-data-table-panel .dataTables_filter .form-control:hover,
.bootstrap-data-table-panel .dataTables_filter .form-control:focus {
  background: transparent;
}
.dataTables_length {
  display: inline-block;
  float: left;
  margin-right: 30px;
}
.dt-buttons {
  margin-bottom: 15px;
}
.dt-buttons .dt-button {
  background-image: none;
  background: #ffffff;
  color: #373757;
  border-color: #e7e7e7;
  margin-right: 10px;
  padding: 7px 20px;
  border-radius: 0px;
}
.dt-buttons .dt-button:hover:not(.disabled),
.dt-buttons .dt-button:focus,
.dt-buttons .dt-button.active {
  background-image: none;
  background: #5873fe;
  color: #ffffff;
}
button.dt-button:hover:not(.disabled),
div.dt-button:hover:not(.disabled),
a.dt-button:hover:not(.disabled) {
  background-color: #5873fe;
  background-image: none;
  border: 1px solid #5873fe;
  box-shadow: none;
  color: #ffffff;
}
button.dt-button:focus:not(.disabled),
div.dt-button:focus:not(.disabled),
a.dt-button:focus:not(.disabled) {
  background-color: #5873fe;
  background-image: none;
  border: 1px solid #5873fe;
  box-shadow: none;
  color: #ffffff;
}
button.dt-button:active:hover:not(.disabled):not(.disabled),
button.dt-button.active:hover:not(.disabled):not(.disabled),
div.dt-button:active:hover:not(.disabled):not(.disabled),
div.dt-button.active:hover:not(.disabled):not(.disabled),
a.dt-button:active:hover:not(.disabled):not(.disabled),
a.dt-button.active:hover:not(.disabled):not(.disabled) {
  background-color: #5873fe;
  background-image: none;
  border: 1px solid #5873fe;
  box-shadow: none;
  color: #ffffff;
}
button.dt-button:active:not(.disabled),
button.dt-button.active:not(.disabled),
div.dt-button:active:not(.disabled),
div.dt-button.active:not(.disabled),
a.dt-button:active:not(.disabled),
a.dt-button.active:not(.disabled) {
  background-color: #5873fe;
  background-image: none;
  border: 1px solid #5873fe;
  box-shadow: none;
  color: #ffffff;
}
@media (max-width: 767px) {
  .dataTables_length {
    margin-left: 10px;
  }
  select.input-sm {
    width: 167px;
  }
  .bootstrap-data-table-panel .dataTables_filter {
    margin-left: 12px;
    text-align: left;
    padding-right: 10px;
  }
  .bootstrap-data-table-panel .dataTables_filter .form-control {
    margin-left: 0px;
  }
}
.panel {
  border-radius: 0;
  margin: 15px 0;
}
.panel-body {
  font-family: 'Roboto', sans-serif;
}
.panel-primary {
  border-color: #5873fe;
}
.panel-primary .panel-heading {
  background: #5873fe;
  border-color: #5873fe;
  color: #ffffff;
}
.panel-success {
  border-color: #28a745;
}
.panel-success .panel-heading {
  background: #28a745;
  border-color: #28a745;
  color: #ffffff;
}
.panel-info {
  border-color: #03a9f4;
}
.panel-info .panel-heading {
  background: #03a9f4;
  border-color: #03a9f4;
  color: #ffffff;
}
.panel-danger {
  border-color: #dc3545;
}
.panel-danger .panel-heading {
  background: #dc3545;
  border-color: #dc3545;
  color: #ffffff;
}
.panel-warning {
  border-color: #e7b63a;
}
.panel-warning .panel-heading {
  background: #e7b63a;
  border-color: #e7b63a;
  color: #ffffff;
}
.panel-pink {
  border-color: #e6a1f2;
}
.panel-pink .panel-heading {
  background: #e6a1f2;
  border-color: #e6a1f2;
  color: #ffffff;
}
.panel-dark {
  border-color: #545454;
}
.panel-dark .panel-heading {
  background: #545454;
  border-color: #545454;
  color: #ffffff;
}
.panel-white {
  border-color: #252525;
}
.panel-white .panel-heading {
  background: #ffffff;
  border-color: #252525;
  color: #252525;
}
.btn-default {
  background: #878787;
  border-color: #878787;
  color: #ffffff;
}
.btn-default.active,
.btn-default:focus,
.btn-default:hover {
  background: #6e6e6e;
  border-color: #878787;
  color: #ffffff;
  box-shadow: none;
}
.btn-primary {
  background: #5873fe;
  border-color: #5873fe;
  color: #ffffff;
}
.btn-primary.active,
.btn-primary:focus,
.btn-primary:hover {
  background: #2549fe;
  border-color: #5873fe;
  color: #ffffff;
  box-shadow: none;
}
.btn-success {
  background: #28a745;
  border-color: #28a745;
  color: #ffffff;
}
.btn-success.active,
.btn-success:focus,
.btn-success:hover {
  background: #1e7e34;
  border-color: #28a745;
  color: #ffffff;
  box-shadow: none;
}
.btn-info {
  background: #03a9f4;
  border-color: #03a9f4;
  color: #ffffff;
}
.btn-info.active,
.btn-info:focus,
.btn-info:hover {
  background: #0286c2;
  border-color: #03a9f4;
  color: #ffffff;
  box-shadow: none;
}
.btn-warning {
  background: #e7b63a;
  border-color: #e7b63a;
  color: #ffffff;
}
.btn-warning.active,
.btn-warning:focus,
.btn-warning:hover {
  background: #d49f1a;
  border-color: #e7b63a;
  color: #ffffff;
  box-shadow: none;
}
.btn-danger {
  background: #dc3545;
  border-color: #dc3545;
  color: #ffffff;
}
.btn-danger.active,
.btn-danger:focus,
.btn-danger:hover {
  background: #bd2130;
  border-color: #dc3545;
  color: #ffffff;
  box-shadow: none;
}
.btn-pink {
  background: #e6a1f2;
  border-color: #e6a1f2;
  color: #ffffff;
}
.btn-pink.active,
.btn-pink:focus,
.btn-pink:hover {
  background: #da74ec;
  border-color: #e6a1f2;
  color: #ffffff;
  box-shadow: none;
}
.btn-dark {
  background: #545454;
  border-color: #545454;
  color: #ffffff;
}
.btn-dark.active,
.btn-dark:focus,
.btn-dark:hover {
  background: #3b3b3b;
  border-color: #545454;
  color: #ffffff;
  box-shadow: none;
}
.btn-addon {
  position: relative;
  padding-left: 40px;
}
.btn-addon i {
  background: rgba(0, 0, 0, 0.1);
  left: -1px;
  margin-right: 20px;
  padding: 10px;
  position: absolute;
  top: -1px;
}
.btn-addon.btn-lg {
  padding-left: 60px;
}
.btn-addon.btn-lg i {
  padding: 14px;
}
.btn-addon.btn-md {
  padding-left: 45px;
}
.btn-addon.btn-md i {
  padding: 10px;
}
.btn-addon.btn-sm {
  padding-left: 40px;
}
.btn-addon.btn-sm i {
  padding: 9px;
}
.btn-addon.btn-xs {
  padding-left: 25px;
}
.btn-addon.btn-xs i {
  padding: 5px;
}
.btn-rounded {
  border-radius: 100px;
}
.btn-outline {
  background: transparent;
  color: #373757;
}
.btn-flat {
  border-radius: 0;
}
.dropdown-menu li {
  padding: 0 10px;
  font-size: 14px;
}
/*    Header
---------------*/
.header {
  background: #ffffff;
  z-index: 990;
  margin-left: 250px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
  transition: margin-left 300ms ease-in-out 0s;
}
.logo {
  background: #343957;
  display: inline-block;
  padding: 15px 0;
  text-align: center;
  width: 250px;
  transition: width 300ms ease-in-out;
}
.logo span {
  color: rgba(160, 180, 200, 0.85);
  font-size: 20px;
  font-weight: 700;
}
.sidebar-hide .logo {
  width: 0;
}
.sidebar-hide .logo span {
  display: none;
}
.header-icon {
  font-size: 18px;
  padding: 12px 15px;
  color: #252525;
  position: relative;
  transition: all 0.4s ease-in-out;
  display: inline-block;
  vertical-align: middle;
  float: left;
}
.header-icon i,
.header-icon img,
.header-icon span {
  cursor: pointer;
}
.header-icon.active,
.header-icon:focus,
.header-icon:hover {
  background: rgba(255, 255, 255, 0.3);
}
.header-icon.active .drop-down {
  visibility: visible;
  opacity: 1;
  transform: translateY(0px);
}
.drop-down {
  background: #ffffff;
  color: #252525;
  visibility: hidden;
  opacity: 0;
  width: 320px;
  position: absolute;
  right: 0;
  top: 55px;
  transform: translateY(50px);
  transition: all 0.4s ease-in-out;
  border-top: 0;
  border: 1px solid #e7e7e7;
  z-index: 999;
}
.header-left .drop-down {
  left: 0;
}
.dropdown-content-heading {
  padding: 10px 15px;
}
.dropdown-content-heading span {
  font-size: 13px;
  font-family: 'Roboto', sans-serif;
  color: #373757;
}
.dropdown-content-heading i {
  position: relative;
  top: 5px;
  opacity: 1!important;
  color: #5873fe;
}
.dropdown-content-body li {
  padding: 15px;
  border-top: 1px solid #eef5f9;
}
.dropdown-content-body li.active,
.dropdown-content-body li:focus,
.dropdown-content-body li:hover {
  background: #eef5f9;
  border-top: 1px solid #eef5f9;
}
.dropdown-content-body li a.active,
.dropdown-content-body li a:focus,
.dropdown-content-body li a:hover {
  color: #868e96;
}
.dropdown-content-body li:last-child {
  padding: 5px 15px;
}
.notification-heading {
  font-size: 13px;
  font-weight: 700;
  color: #373757;
}
.avatar-img {
  border-radius: 100px;
  width: 25px;
  position: relative;
  top: -3px;
}
.user-avatar {
  font-size: 14px;
  font-weight: 700;
}
.notification-text {
  font-size: 12px;
  font-family: 'Roboto', sans-serif;
  max-width: 100%;
  overflow: hidden;
  text-overflow: ellipsis;
  padding-top: 3px;
}
.notification-timestamp {
  font-size: 11px;
}
.notification-percentage {
  font-size: 12px;
  position: relative;
  top: 12px;
}
.notification-unread {
  background: #eef5f9;
}
.notification-unread .notification-heading {
  color: #555;
}
.more-link {
  font-size: 12px;
  color: #5873fe;
  display: inline-block;
}
.dropdown-profile {
  width: 200px;
}
.dropdown-profile .trial-day {
  font-size: 11px;
  padding-top: 2px;
  color: #5873fe;
}
.dropdown-profile li {
  padding: 7px 15px;
}
.dropdown-profile li a {
  display: block;
  color: #373757;
}
.dropdown-profile li a.active,
.dropdown-profile li a:focus,
.dropdown-profile li a:hover {
  color: #373757;
}
.dropdown-profile li a span {
  font-family: 'Roboto', sans-serif;
  font-size: 14px;
}
.dropdown-profile li a i {
  margin-right: 5px;
  font-size: 14px;
}
.dropdown-profile li:last-child {
  padding: 7px 15px;
}
.header-link {
  position: relative;
  top: -3px;
  font-size: 14px;
}
/*    Search box
----------------------*/
.main .page-header {
  min-height: 50px;
  margin: 15px 0 5px;
  padding: 0 15px;
  border-bottom: 0;
  border-radius: 3px;
}
.main .page-header h1 {
  font-size: 18px;
  padding: 14px 0;
  margin: 0;
}
.main .page-header h1 span {
  font-size: 14px;
}
.main .page-header .breadcrumb {
  margin: 0;
  padding: 15px;
  background: transparent;
  float: right;
}
.main .page-header .breadcrumb li.active {
  font-family: 'Roboto', sans-serif;
  font-weight: normal;
  font-size: 14px;
}
.main .page-header .breadcrumb li a {
  font-size: 14px;
  font-family: 'Roboto', sans-serif;
  display: block;
}
.dropdown-task .progress {
  height: 5px;
  margin-bottom: 0;
  margin-top: 20px;
  box-shadow: none;
}
.dropdown-task .progress-bar {
  box-shadow: none;
}
/*  Responsive*/
@media (min-width: 320px) and (max-width: 679px) {
  .sidebar {
    top: 50px;
  }
}
.map {
  width: 100%;
  height: 400px;
}
.chat-sidebar {
  background-color: #eef5f9;
  border-left: 1px solid #e7e7e7;
  position: fixed;
  right: -240px;
  bottom: 0;
  top: 55px;
  width: 240px;
  z-index: 2;
  -webkit-transition: all 0.5s ease 0s;
  transition: all 0.5s ease 0s;
}
.chat-sidebar .user-name {
  font-family: 'Roboto', sans-serif;
}
.chat-sidebar .content {
  font-family: 'Roboto', sans-serif;
}
.chat-sidebar .textarea {
  font-family: 'Roboto', sans-serif;
}
.chat-sidebar .seen {
  font-family: 'Roboto', sans-serif;
}
.chat-sidebar.is-active {
  right: 0;
}
.chat-user-search .input-group-addon {
  background: #ffffff;
  border-radius: 0px;
  border: 0px;
}
.chat-user-search .form-control {
  border: 0px;
}
.hidden {
  display: none;
}
/*    Home Chat Widget
---------------------------------*/
.chat-widget .chat_window {
  position: relative;
  width: 100%;
  height: 500px;
  border-radius: 10px;
  background-color: #ffffff;
  background-color: #f8f8f8;
  overflow: hidden;
}
.chat-widget .messages {
  position: relative;
  list-style: none;
  padding: 20px 10px 0 10px;
  margin: 0;
  min-height: 350px;
  overflow: scroll;
}
.chat-widget .messages .message {
  clear: both;
  overflow: hidden;
  margin-bottom: 20px;
  transition: all 0.5s linear;
  opacity: 0;
}
.chat-widget .messages .message .avatar {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: inline-block;
}
.chat-widget .messages .message .text_wrapper {
  display: inline-block;
  padding: 20px;
  border-radius: 6px;
  width: calc(100% - 100px);
  min-width: 100px;
  position: relative;
}
.chat-widget .messages .message .text_wrapper .text {
  font-size: 18px;
  font-weight: 300;
}
.chat-widget .messages .message .text_wrapper::after {
  top: 18px;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-width: 13px;
  margin-top: 0px;
}
.chat-widget .messages .message .text_wrapper:before {
  top: 18px;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}
.chat-widget .messages .message .text_wrapper::before {
  border-width: 15px;
  margin-top: -2px;
}
.chat-widget .messages .message.left .text_wrapper::after,
.chat-widget .messages .message.left .text_wrapper::before {
  right: 100%;
  border-right-color: #ffe6cb;
}
.chat-widget .messages .message.left .avatar {
  background-color: #f5886e;
  float: left;
}
.chat-widget .messages .message.left .text_wrapper {
  background-color: #ffe6cb;
  margin-left: 20px;
}
.chat-widget .messages .message.left .text {
  color: #c48843;
}
.chat-widget .messages .message.right .text_wrapper::after,
.chat-widget .messages .message.right .text_wrapper::before {
  left: 100%;
  border-left-color: #c7eafc;
}
.chat-widget .messages .message.right .avatar {
  background-color: #fdbf68;
  float: right;
}
.chat-widget .messages .message.right .text_wrapper {
  background-color: #c7eafc;
  margin-right: 20px;
  float: right;
}
.chat-widget .messages .message.right .text {
  color: #45829b;
}
.chat-widget .messages .message.appeared {
  opacity: 1;
}
.chat-widget .bottom_wrapper {
  position: relative;
  position: absolute;
  width: 100%;
  background-color: #ffffff;
  padding: 20px 20px;
  bottom: 0;
}
.chat-widget .bottom_wrapper .message_input_wrapper {
  display: inline-block;
  height: 50px;
  border-radius: 25px;
  border: 1px solid #bcbdc0;
  width: calc(100% - 160px);
  position: relative;
  padding: 0 20px;
}
.chat-widget .bottom_wrapper .message_input_wrapper .message_input {
  border: none;
  height: 100%;
  box-sizing: border-box;
  width: calc(100% - 45px);
  position: absolute;
  outline-width: 0;
  color: gray;
}
.chat-widget .bottom_wrapper .send_message {
  width: 140px;
  height: 50px;
  display: inline-block;
  border-radius: 50px;
  background-color: #a3d063;
  border: 2px solid #a3d063;
  color: #ffffff;
  cursor: pointer;
  transition: all 0.2s linear;
  text-align: center;
  float: right;
}
.chat-widget .bottom_wrapper .send_message .text {
  font-size: 18px;
  font-weight: 300;
  display: inline-block;
  line-height: 48px;
}
.chat-widget .bottom_wrapper .send_message:hover {
  color: #a3d063;
  background-color: #ffffff;
}
.chat-widget .message_template {
  display: none;
}
.testimonial-widget-one .testimonial-content {
  text-align: right;
}
.testimonial-widget-one .testimonial-text {
  margin-bottom: 15px;
}
.testimonial-widget-one .testimonial-author-position {
  font-family: 'Roboto', sans-serif;
  margin-right: 75px;
  position: relative;
  top: -5px;
  font-size: 12px;
}
.testimonial-widget-one .testimonial-author {
  padding-top: 15px;
  margin-right: 75px;
  position: relative;
  top: -5px;
  font-weight: 600;
  color: #373757;
}
.testimonial-widget-one .testimonial-author-img {
  height: 50px !important;
  width: 50px !important;
  border-radius: 100px;
  position: absolute;
  bottom: 0;
  right: 0;
}
.weather-one i {
  font-size: 70px;
  position: relative;
  top: 5px;
  color: #ddd;
}
.weather-one h2 {
  display: inline-block;
  float: right;
  font-size: 48px;
  color: #ffffff;
}
.weather-one .city {
  position: relative;
  text-align: right;
  top: -25px;
}
.weather-one .currently {
  font-size: 16px;
  font-weight: 400;
  position: relative;
  top: 25px;
}
.weather-one .celcious {
  text-align: right;
  font-size: 20px;
}
[contenteditable]:hover,
[contenteditable]:focus {
  background: #a4b3fe;
}
.control-bar {
  position: relative;
  z-index: 100;
  background: #5873fe;
  color: #ffffff;
  padding: 15px;
  margin-bottom: 30px;
}
.control-bar .slogan {
  font-weight: bold;
  font-size: 1.2rem;
  display: inline-block;
  margin-right: 2rem;
}
.control-bar label {
  margin: 0px;
  color: #ffffff;
}
.control-bar a {
  margin: 0;
  padding: .5em 1em;
  background: #ffffff;
  color: #373757;
}
.control-bar a:hover {
  background: #a4b3fe;
}
.control-bar input {
  border: none;
  background: #a4b3fe;
  max-width: 30px;
  text-align: center;
  color: #373757;
}
.control-bar input:hover {
  background: #a4b3fe;
}
.hidetax .taxrelated {
  display: none;
}
.showtax .notaxrelated {
  display: none;
}
.hidedate .daterelated {
  display: none;
}
.showdate .notdaterelated {
  display: none;
}
.details input {
  display: inline;
  margin: 0 0 0 .5rem;
  border: none;
  width: 55px;
  min-width: 0;
  background: transparent;
  text-align: left;
}
.invoice-edit .rate:before,
.invoice-edit .price:before,
.invoice-edit .sum:before,
.invoice-edit .tax:before,
.invoice-edit #total_price:before,
.invoice-edit #total_tax:before {
  content: '€';
}
.invoice-edit .me,
.invoice-edit .info,
.invoice-edit .bank,
.invoice-edit .smallme,
.invoice-edit .client,
.invoice-edit .bill,
.invoice-edit .details {
  padding: 15px;
}
.invoice-logo img {
  display: block;
  vertical-align: top;
  width: 50px;
}
/**
 * INVOICELIST BODY
 */
.invoicelist-body {
  margin: 1rem;
}
.invoicelist-body table {
  width: 100%;
}
.invoicelist-body thead {
  text-align: left;
  border-bottom: 2pt solid #666;
}
.invoicelist-body td,
.invoicelist-body th {
  position: relative;
  padding: 1rem;
}
.invoicelist-body tr:nth-child(even) {
  background: #eef5f9;
}
.invoicelist-body tr:hover .removeRow {
  display: block;
}
.invoicelist-body input {
  display: inline;
  margin: 0;
  border: none;
  width: 80%;
  min-width: 0;
  background: transparent;
  text-align: left;
}
.invoicelist-body .control {
  display: inline-block;
  color: white;
  background: #5873fe;
  padding: 3px 7px;
  font-size: .9rem;
  text-transform: uppercase;
  cursor: pointer;
}
.invoicelist-body .control:hover {
  background: #7188fe;
}
.invoicelist-body .newRow {
  margin: .5rem 0;
  float: left;
}
.invoicelist-body .removeRow {
  display: none;
  position: absolute;
  top: .1rem;
  bottom: .1rem;
  left: -1.3rem;
  font-size: .7rem;
  border-radius: 3px 0 0 3px;
  padding: .5rem;
}
/**
 * INVOICE LIST FOOTER
 */
.invoicelist-footer {
  margin: 1rem;
}
.invoicelist-footer table {
  float: right;
  width: 25%;
}
.invoicelist-footer table td {
  padding: 1rem 2rem 0 1rem;
  text-align: right;
}
.invoicelist-footer table tr:nth-child(2) td {
  padding-top: 0;
}
.invoicelist-footer table #total_price {
  font-size: 2rem;
  color: #5873fe;
}
/**
 * NOTE
 */
.note {
  margin: 75px 15px;
}
.hidenote .note {
  display: none;
}
.note h2 {
  margin: 0;
  font-size: 12px;
  font-weight: bold;
}
.note p {
  font-size: 12px;
  padding: 0px 5px;
}
/**
 * FOOTER
 */
footer {
  display: block;
  margin: 1rem 0;
  padding: 1rem 0 0;
}
footer p {
  font-size: 12px;
}
/**
 * PRINT STYLE
 */
@media print {
  .header,
  .sidebar,
  .chat-sidebar,
  .control,
  .control-bar {
    display: none !important;
  }
  [contenteditable]:hover,
  [contenteditable]:focus {
    outline: none;
  }
}
#invoice {
  position: relative;
  /*  top: -290px;*/
  margin-bottom: 120px;
  /*  width: 700px;*/
  background: #ffffff;
  padding: 30px;
}
#invoice-table {
  /* Targets all id with 'col-' */
  border-bottom: 1px solid #e7e7e7;
  padding: 30px 0px;
}
#invoice-top {
  min-height: 120px;
}
#invoice-mid {
  min-height: 120px;
}
#invoice-bot {
  min-height: 250px;
}
.invoice-logo {
  float: left;
  height: 60px;
  width: 60px;
  background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
  background-size: 60px 60px;
}
.clientlogo {
  float: left;
  height: 60px;
  width: 60px;
  background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
  background-size: 60px 60px;
  border-radius: 50px;
}
.invoice-info {
  display: block;
  float: left;
  margin-left: 20px;
}
.invoice-info h2 {
  color: #373757;
  font-size: 14px;
}
.invoice-info p {
  font-size: 12px;
}
.title {
  float: right;
}
.title h4 {
  color: #373757;
  text-align: right;
}
.title p {
  text-align: right;
  font-size: 12px;
}
#project {
  margin-left: 52%;
}
#project p {
  font-size: 12px;
}
#invoice-table h2 {
  font-size: 18px;
}
.tabletitle {
  padding: 5px;
  background: #e7e7e7;
}
.service {
  border: 1px solid #e7e7e7;
}
.table-item {
  width: 50%;
}
.itemtext {
  font-size: .9em;
}
#legalcopy {
  margin-top: 30px;
}
#legalcopy p {
  font-size: 12px;
}
.effect2 {
  position: relative;
}
.effect2:before,
.effect2:after {
  z-index: -1;
  position: absolute;
  content: "";
  bottom: 15px;
  left: 10px;
  width: 50%;
  top: 80%;
  max-width: 300px;
  background: #777;
  -webkit-box-shadow: 0 15px 10px #777;
  -moz-box-shadow: 0 15px 10px #777;
  box-shadow: 0 15px 10px #777;
  -webkit-transform: rotate(-3deg);
  -moz-transform: rotate(-3deg);
  -o-transform: rotate(-3deg);
  -ms-transform: rotate(-3deg);
  transform: rotate(-3deg);
}
.effect2:after {
  -webkit-transform: rotate(3deg);
  -moz-transform: rotate(3deg);
  -o-transform: rotate(3deg);
  -ms-transform: rotate(3deg);
  transform: rotate(3deg);
  right: 10px;
  left: auto;
}
.legal {
  width: 70%;
}
/* All Invoice Page Responsive
--------------------------- */
@media (max-width: 480px) {
  .control-bar {
    padding: 15px 15px 40px;
  }
}
@media (max-width: 360px) {
  .notaxrelated {
    margin-top: 15px;
  }
}
/*    Widget One
---------------------------*/
.stat-widget-one .stat-icon {
  vertical-align: top;
}
.stat-widget-one .stat-icon i {
  font-size: 30px;
  border-width: 3px;
  border-style: solid;
  border-radius: 100px;
  padding: 15px;
  font-weight: 900;
  display: inline-block;
}
.stat-widget-one .stat-content {
  margin-left: 30px;
  margin-top: 7px;
}
.stat-widget-one .stat-text {
  font-size: 14px;
  color: #868e96;
}
.stat-widget-one .stat-digit {
  font-size: 24px;
  color: #373757;
}
/*    Widget Two
---------------------------*/
.stat-widget-two {
  text-align: center;
}
.stat-widget-two .stat-digit {
  font-size: 1.75rem;
  font-weight: 500;
  color: #373757;
}
.stat-widget-two .stat-digit i {
  font-size: 18px;
  margin-right: 5px;
}
.stat-widget-two .stat-text {
  font-size: 16px;
  margin-bottom: 5px;
  color: #868e96;
}
.stat-widget-two .progress {
  height: 8px;
  margin-bottom: 0;
  margin-top: 20px;
  box-shadow: none;
}
.stat-widget-two .progress-bar {
  box-shadow: none;
}
/*    Widget Three
---------------------------*/
.stat-widget-three .stat-icon {
  display: inline-block;
  padding: 33px;
  position: absolute;
  line-height: 21px;
}
.stat-widget-three .stat-icon i {
  font-size: 30px;
  color: #ffffff;
}
.stat-widget-three .stat-content {
  text-align: center;
  padding: 15px;
  margin-left: 90px;
}
.stat-widget-three .stat-digit {
  font-size: 30px;
}
.stat-widget-three .stat-text {
  padding-top: 4px;
}
.home-widget-three .stat-icon {
  line-height: 19px;
  padding: 27px;
}
.home-widget-three .stat-digit {
  font-size: 24px;
  font-weight: 300;
  color: #373757;
}
.home-widget-three .stat-content {
  text-align: center;
  margin-left: 60px;
  padding: 13px;
}
.stat-widget-four {
  position: relative;
}
.stat-widget-four .stat-icon {
  display: inline-block;
  position: absolute;
  top: 5px;
}
.stat-widget-four i {
  display: block;
  font-size: 36px;
}
.stat-widget-four .stat-content {
  margin-left: 40px;
  text-align: center;
}
.stat-widget-four .stat-heading {
  font-size: 20px;
}
.stat-widget-five .stat-icon {
  border-radius: 100px;
  display: inline-block;
  position: absolute;
}
.stat-widget-five i {
  border-radius: 100px;
  display: block;
  font-size: 36px;
  padding: 30px;
}
.stat-widget-five .stat-content {
  margin-left: 100px;
  padding: 24px 0;
  position: relative;
  text-align: right;
  vertical-align: middle;
}
.stat-widget-five .stat-heading {
  text-align: right;
  padding-left: 80px;
  font-size: 20px;
  font-weight: 200;
}
.stat-widget-six {
  position: relative;
}
.stat-widget-six .stat-icon {
  display: inline-block;
  position: absolute;
  top: 5px;
}
.stat-widget-six i {
  display: block;
  font-size: 36px;
}
.stat-widget-six .stat-content {
  margin-left: 40px;
  text-align: center;
}
.stat-widget-six .stat-heading {
  font-size: 16px;
  font-weight: 300;
}
.stat-widget-six .stat-text {
  font-size: 12px;
  padding-top: 4px;
}
.stat-widget-seven .stat-heading {
  text-align: center;
}
.stat-widget-seven .gradient-circle {
  text-align: center;
  position: relative;
  margin: 30px auto;
  display: inline-block;
  width: 100%;
}
.stat-widget-seven .gradient-circle i {
  position: absolute;
  left: 0;
  right: 0;
  text-align: center;
  top: 35px;
  font-size: 30px;
}
.stat-widget-seven .stat-footer {
  text-align: center;
  margin-top: 30px;
}
.stat-widget-seven .stat-footer .stat-count {
  padding-left: 5px;
}
.stat-widget-seven .count-header {
  color: #252525;
  font-size: 12px;
  font-weight: 400;
  line-height: 30px;
}
.stat-widget-seven .stat-count {
  font-size: 18px;
  font-weight: 400;
  color: #252525;
}
.stat-widget-seven .analytic-arrow {
  position: relative;
}
.stat-widget-seven .analytic-arrow i {
  font-size: 12px;
}
/* Stat widget Eight
--------------------------- */
.stat-widget-eight {
  padding: 15px;
}
.stat-widget-eight .header-title {
  font-size: 20px;
  font-weight: 300;
}
.stat-widget-eight .ti-more-alt {
  color: #878787;
  cursor: pointer;
  left: -5px;
  position: absolute;
  transform: rotate(90deg);
}
.stat-widget-eight .stat-content {
  margin-top: 50px;
}
.stat-widget-eight .stat-content .ti-arrow-up {
  font-size: 30px;
  color: #28a745;
}
.stat-widget-eight .stat-content .stat-digit {
  font-size: 24px;
  font-weight: 300;
  margin-left: 15px;
}
.stat-widget-eight .stat-content .progress-stats {
  color: #aaadb2;
  font-weight: 400;
  position: relative;
  top: 10px;
}
.stat-widget-eight .progress {
  margin-bottom: 0;
  margin-top: 30px;
  height: 7px;
  background: #EAEAEA;
  box-shadow: none;
}
.stat-widget-nine .all-like {
  float: right;
}
.stat-widget-nine .stat-icon i {
  font-size: 22px;
}
.stat-widget-nine .stat-text {
  font-size: 14px;
}
.stat-widget-nine .stat-digit {
  font-size: 14px;
}
.stat-widget-nine .like-count {
  font-size: 30px;
}
.horizontal {
  position: relative;
}
.horizontal:before {
  background: #ffffff;
  bottom: 0;
  content: "";
  height: 38px;
  left: 0;
  margin: 0 auto;
  position: absolute;
  right: 0;
  width: 1px;
}
.widget-ten span i {
  color: #ffffff;
  opacity: 0.5;
}
.widget-ten h5 {
  color: #ffffff;
}
.widget-ten p {
  color: #ffffff !important;
  opacity: 0.75;
}
/*
=================================================
    Responsive
=================================================
*/
@media (max-width: 768px) {
  .card {
    display: inline-block;
    width: 100%;
  }
}
@media (max-width: 360px) {
  .stat-widget-five .stat-heading {
    padding-left: 0;
  }
  .stat-widget-two .stat-digit {
    font-size: 16px;
  }
  .stat-widget-two .stat-text {
    font-size: 14px;
  }
  .stat-widget-three .stat-digit {
    font-size: 20px;
  }
  .stat-widget-four .stat-heading {
    font-size: 18px;
  }
  .stat-widget-three .stat-icon {
    padding: 26px;
  }
}
.round-widget {
  border: 1px solid red;
  border-radius: 100px;
  display: inline-block;
  height: 60px;
  line-height: 60px;
  text-align: center;
  width: 60px;
}
.recent-comment .media {
  border-bottom: 1px solid #e7e7e7;
  padding-bottom: 10px;
  padding-top: 10px;
}
.recent-comment .media-left {
  padding-right: 25px;
}
.recent-comment .media-left img {
  border-radius: 100px;
  width: 40px;
}
.recent-comment .media-body {
  position: relative;
}
.recent-comment .media-body h4 {
  font-size: 16px;
  margin-bottom: 5px;
}
.recent-comment .media-body p {
  margin-bottom: 5px;
  line-height: 16px;
  color: #868e96;
}
.recent-comment .comment-date {
  position: absolute;
  right: 0;
  top: 0;
  color: #373757;
  font-family: 'Roboto', sans-serif;
  font-size: 12px;
}
.comment-action {
  float: left;
}
.comment-action .badge {
  text-transform: uppercase;
  font-family: 'Roboto', sans-serif;
}
.comment-action i {
  padding: 0 5px;
}
.recent-meaasge {
  margin-top: 15px;
}
.recent-meaasge .media {
  border-bottom: 1px solid #e7e7e7;
  padding-top: 10px;
  padding-bottom: 10px;
}
.recent-meaasge .media-left {
  padding-right: 25px;
}
.recent-meaasge .media-left img {
  border-radius: 100px;
}
.recent-meaasge .media-body {
  position: relative;
}
.recent-meaasge .media-body h4 {
  font-size: 16px;
}
.recent-meaasge .media-body p {
  margin-top: 10px;
  margin-bottom: 10px;
}
.meaasge-date {
  float: right;
  color: #373757;
  position: absolute;
  right: 0;
  top: 0;
  font-size: 12px;
}
/*    Input Style
------------------------*/
.form-group {
  margin-bottom: 20px;
}
.form-control {
  height: 42px;
  border-radius: 0px;
  box-shadow: none;
  border-color: #e7e7e7;
  font-family: 'Roboto', sans-serif;
}
.form-control:hover {
  box-shadow: none;
  border-color: #e7e7e7;
}
.form-control:focus,
.form-control.active {
  box-shadow: none;
  border-color: #878787;
}
.input-default {
  border-radius: 4px;
}
.input-flat {
  border-radius: 0px;
}
.input-rounded {
  border-radius: 100px;
}
.input-focus {
  border-color: #5873fe;
}
.input-focus:focus {
  border-color: #5873fe;
}
/*    Search Box Input Button
--------------------------------*/
.input-group-btn .btn {
  padding: 10px 12px;
}
.input-group-default .form-control {
  border-radius: 4px;
}
.input-group-flat .form-control {
  border-radius: 4px;
}
.input-group-flat .btn {
  border-radius: 0px;
}
.input-group-rounded .form-control {
  border-radius: 100px;
}
.input-group-rounded .btn-group-left {
  border-top-left-radius: 100px;
  border-bottom-left-radius: 100px;
}
.input-group-rounded .btn-group-right {
  border-top-right-radius: 100px;
  border-bottom-right-radius: 100px;
}
.input-group-close-icon {
  background: none;
  color: #252525;
  border-color: #e7e7e7;
}
.input-group-close-icon:hover,
.input-group-close-icon:focus,
.input-group-close-icon.active {
  background: none;
  border-color: #e7e7e7;
  color: #252525;
}
/*    Input States
-----------------------*/
.has-default .form-control:hover,
.has-success .form-control:hover,
.has-warning .form-control:hover,
.has-error .form-control:hover,
.has-default .form-control:focus,
.has-success .form-control:focus,
.has-warning .form-control:focus,
.has-error .form-control:focus,
.has-default .form-control.active,
.has-success .form-control.active,
.has-warning .form-control.active,
.has-error .form-control.active {
  box-shadow: none;
}
.has-default .control-label {
  color: #878787;
}
.has-default .form-control {
  border-color: #878787;
}
.has-default .form-control:hover,
.has-default .form-control:focus,
.has-default .form-control.active {
  border-color: #878787;
}
.has-success .control-label {
  color: #28a745;
}
.has-success .form-control {
  border-color: #28a745;
}
.has-success .form-control:hover,
.has-success .form-control:focus,
.has-success .form-control.active {
  border-color: #28a745;
}
.has-warning .control-label {
  color: #e7b63a;
}
.has-warning .form-control {
  border-color: #e7b63a;
}
.has-warning .form-control:hover,
.has-warning .form-control:focus,
.has-warning .form-control.active {
  border-color: #e7b63a;
}
.has-error .control-label {
  color: #dc3545;
}
.has-error .form-control {
  border-color: #dc3545;
}
.has-error .form-control:hover,
.has-error .form-control:focus,
.has-error .form-control.active {
  border-color: #dc3545;
}
.has-feedback label ~ .form-control-feedback {
  top: 35px;
}
.form-horizontal .has-feedback .form-control-feedback {
  top: 5px;
}
.has-success .form-control-feedback {
  color: #28a745;
}
.has-warning .form-control-feedback {
  color: #e7b63a;
}
.has-error .form-control-feedback {
  color: #dc3545;
}
.has-success .input-group-addon {
  background-color: #71dd8a;
  border-color: #28a745;
  color: #28a745;
}
.has-warning .input-group-addon {
  background-color: #f5e0ac;
  border-color: #e7b63a;
  color: #e7b63a;
}
.has-error .input-group-addon {
  background-color: #efa2a9;
  border-color: #dc3545;
  color: #dc3545;
}
/*    Input Size
--------------------*/
.input-sm {
  font-size: 12px;
  height: 30px;
  line-height: 1.5;
}
.input-lg {
  font-size: 18px;
  height: 46px;
  line-height: 1.33333;
}
/*    Basic form
----------------------*/
label {
  font-weight: 400;
  margin-bottom: 10px;
}
/*    Form Horizontal
----------------------*/
.form-horizontal .control-label {
  padding-top: 12px;
}
.form-horizontal .form-group {
  margin-left: 0px;
  margin-right: 0px;
}
.is-invalid .form-control {
  border-color: #dc3545;
}
.invalid-feedback {
  color: #ef5350;
  display: none;
  margin-top: 0.25rem;
}
.is-invalid .invalid-feedback,
.is-invalid .invalid-tooltip {
  display: block;
}
.mail-box {
  border-collapse: collapse;
  border-spacing: 0;
  display: table;
  table-layout: fixed;
  width: 100%;
}
.mail-box aside {
  display: table-cell;
  float: none;
  height: 100%;
  padding: 0;
  vertical-align: top;
}
.mail-box .sm-side {
  background: #ffffff;
  border-radius: 4px 0 0 4px;
  width: 25%;
}
.mail-box .sm-side .user-head {
  background: #ffffff;
  border-radius: 4px 0 0;
  color: #373757;
  min-height: 80px;
  padding: 10px;
}
.mail-box .lg-side {
  background: none repeat scroll 0 0 #ffffff;
  border-radius: 0 4px 4px 0;
  width: 75%;
}
.user-head .inbox-avatar {
  float: left;
  width: 65px;
}
.user-head .inbox-avatar img {
  border-radius: 100px;
  height: 65px;
  width: 65px;
}
.user-head .user-name {
  display: inline-block;
  margin: 0 0 0 10px;
}
.user-head .user-name h5 {
  font-size: 14px;
  font-weight: 300;
  margin-bottom: 0;
  margin-top: 15px;
}
.user-head .user-name h5 a {
  color: #373757;
}
.user-head .user-name span a {
  color: #373757;
  font-size: 12px;
}
a.mail-dropdown {
  background: none repeat scroll 0 0 #80d3d9;
  border-radius: 2px;
  color: #01a7b3;
  font-size: 10px;
  margin-top: 20px;
  padding: 3px 5px;
}
.inbox-body {
  padding: 20px 0px;
}
.inbox-body .modal .modal-body input {
  border: 1px solid #e6e6e6;
  box-shadow: none;
}
.inbox-body .modal .modal-body textarea {
  border: 1px solid #e6e6e6;
  box-shadow: none;
}
.btn-compose {
  background: #5873fe;
  color: #ffffff;
  padding: 12px 0;
  text-align: center;
  width: 70%;
}
.btn-compose:hover,
.btn-compose:focus,
.btn-compose.active {
  background: #5873fe;
  color: #ffffff;
}
ul.inbox-nav {
  display: inline-block;
  margin: 0;
  padding: 0;
  width: 100%;
}
ul.inbox-nav li {
  display: inline-block;
  line-height: 45px;
  width: 100%;
}
ul.inbox-nav li a {
  color: #6a6a6a;
  display: inline-block;
  line-height: 45px;
  padding: 0 20px;
  width: 100%;
  font-family: 'Roboto', sans-serif;
}
ul.inbox-nav li a:hover {
  background: #eef5f9;
  color: #6a6a6a;
}
ul.inbox-nav li a:focus {
  background: #eef5f9;
  color: #6a6a6a;
}
ul.inbox-nav li a i {
  color: #6a6a6a;
  font-size: 16px;
  padding-right: 10px;
}
ul.inbox-nav li a span.label {
  margin-top: 13px;
}
ul.inbox-nav li.active a {
  background: #eef5f9;
  color: #6a6a6a;
}
.inbox-divider {
  border-bottom: 1px solid #e7e7e7;
}
ul.labels-info li {
  margin: 0;
}
ul.labels-info li h4 {
  color: #5c5c5e;
  font-size: 13px;
  padding-left: 15px;
  padding-right: 15px;
  padding-top: 20px;
  text-transform: uppercase;
}
ul.labels-info li a {
  border-radius: 0;
  color: #6a6a6a;
  font-family: 'Roboto', sans-serif;
}
ul.labels-info li a:hover {
  background: #eef5f9;
  color: #6a6a6a;
}
ul.labels-info li a:focus {
  background: #eef5f9;
  color: #6a6a6a;
}
ul.labels-info li a i {
  padding-right: 10px;
}
.nav.nav-pills.nav-stacked.labels-info p {
  color: #9d9f9e;
  font-size: 11px;
  margin-bottom: 0;
  padding: 0 22px;
}
.inbox-head {
  background: #eef5f9;
  border-radius: 4px 4px 0 0;
  color: #373757;
  min-height: 80px;
  padding: 20px;
}
.inbox-head h3 {
  display: inline-block;
  font-weight: 300;
  margin: 0;
  padding-top: 6px;
}
.inbox-head .sr-input {
  border: medium none;
  border-radius: 4px 0 0 4px;
  box-shadow: none;
  color: #8a8a8a;
  float: left;
  height: 40px;
  padding: 0 10px;
}
.inbox-head .sr-btn {
  background: #ffffff;
  border: medium none;
  border-radius: 0 4px 4px 0;
  color: #373757;
  height: 40px;
  padding: 0 20px;
}
.table-inbox {
  border: 1px solid #e7e7e7;
  margin-bottom: 0;
}
.table-inbox tr td {
  padding: 12px !important;
}
.table-inbox tr td:hover {
  cursor: pointer;
}
.table-inbox tr td .ti-star.inbox-started {
  color: #e7b63a;
}
.table-inbox tr td .ti-star {
  color: #d5d5d5;
}
.table-inbox tr td .ti-star:hover {
  color: #e7b63a;
}
.table-inbox tr.unread td {
  background: #eef5f9;
}
ul.inbox-pagination {
  float: right;
}
ul.inbox-pagination li {
  float: left;
}
.mail-option {
  display: inline-block;
  margin: 26px 0;
  width: 100%;
  font-size: 12px;
}
.mail-option .chk-all {
  margin-right: 5px;
  background: none repeat scroll 0 0 #fcfcfc;
  border: 1px solid #e7e7e7;
  border-radius: 3px !important;
  color: #afafaf;
  display: inline-block;
  padding: 5px 16px;
}
.mail-option .chk-all input[type="checkbox"] {
  margin-top: 0;
}
.mail-option .btn-group {
  margin-right: 5px;
}
.mail-option .btn-group a.btn {
  background: #ffffff;
  border: 1px solid #e7e7e7;
  border-radius: 3px !important;
  font-family: 'Roboto', sans-serif;
  color: #373757;
  display: inline-block;
  padding: 5px 10px;
  font-size: 12px;
}
.mail-option .btn-group a.all {
  border: medium none;
  padding: 0;
  margin-left: 5px;
}
.mail-option .btn-group i {
  margin-left: 5px;
}
.mail-option .card-option-dropdown {
  left: 0;
  right: auto;
}
.inbox-pagination a.np-btn {
  background: none repeat scroll 0 0 #fcfcfc;
  border: 1px solid #e7e7e7;
  border-radius: 3px !important;
  color: #afafaf;
  display: inline-block;
  padding: 5px 15px;
  margin-left: 5px;
}
.inbox-pagination li span {
  display: inline-block;
  margin-right: 5px;
  margin-top: 7px;
}
.fileinput-button {
  background: none repeat scroll 0 0 #eeeeee;
  border: 1px solid #e6e6e6;
  float: left;
  margin-right: 4px;
  overflow: hidden;
  position: relative;
}
.fileinput-button input {
  cursor: pointer;
  direction: ltr;
  font-size: 23px;
  margin: 0;
  opacity: 0;
  position: absolute;
  right: 0;
  top: 0;
  transform: translate(-300px, 0px) scale(4);
}
.modal-header h4.modal-title {
  font-weight: 300;
}
.modal-body label {
  font-weight: 400;
}
.heading-inbox h4 {
  border-bottom: 1px solid #ddd;
  color: #444444;
  font-size: 18px;
  margin-top: 20px;
  padding-bottom: 10px;
}
.sender-info {
  margin-bottom: 20px;
}
.sender-info img {
  height: 30px;
  width: 30px;
}
.sender-dropdown {
  background: none repeat scroll 0 0 #eaeaea;
  color: #777777;
  font-size: 10px;
  padding: 0 3px;
}
.view-mail a {
  color: #dc3545;
}
.attachment-mail {
  margin-top: 30px;
}
.attachment-mail ul {
  display: inline-block;
  margin-bottom: 30px;
  width: 100%;
}
.attachment-mail ul li {
  float: left;
  margin-bottom: 10px;
  margin-right: 10px;
  width: 150px;
}
.attachment-mail ul li img {
  width: 100%;
}
.attachment-mail ul li span {
  float: right;
}
.attachment-mail .file-name {
  float: left;
}
.attachment-mail .links {
  display: inline-block;
  width: 100%;
}
.fileupload-buttonbar .btn {
  margin-bottom: 5px;
}
.fileupload-buttonbar .toggle {
  margin-bottom: 5px;
}
.files .progress {
  width: 200px;
}
.fileupload-processing .fileupload-loading {
  display: block;
}
* html .fileinput-button {
  line-height: 24px;
  margin: 1px -3px 0 0;
}
* + html .fileinput-button {
  margin: 1px 0 0;
  padding: 2px 15px;
}
ul {
  list-style-type: none;
  padding: 0px;
  margin: 0px;
}
.inbox-small-cells {
  text-align: center;
}
.mail-group-checkbox {
  position: relative;
  top: 2px;
}
.mail-checkbox.mail-group-checkbox {
  position: relative;
  top: 2px;
  left: 2px;
}
.table-inbox > tbody > tr > td,
.table > tbody > tr > th,
.table > tfoot > tr > td,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > thead > tr > th {
  border-top: 1px solid #e7e7e7;
  line-height: 1.42857;
  padding: 8px;
  vertical-align: top;
}
@media (max-width: 767px) {
  .files .btn span {
    display: none;
  }
  .files .preview * {
    width: 40px;
  }
  .files .name * {
    display: inline-block;
    width: 80px;
    word-wrap: break-word;
  }
  .files .progress {
    width: 20px;
  }
  .files .delete {
    width: 60px;
  }
}
.progress-bar {
  background-color: #5873fe;
}
.progress-bar-primary {
  background-color: #5873fe;
}
.progress-bar-success {
  background-color: #28a745;
}
.progress-bar-info {
  background-color: #03a9f4;
}
.progress-bar-danger {
  background-color: #dc3545;
}
.progress-bar-warning {
  background-color: #e7b63a;
}
.progress-bar-pink {
  background-color: #e6a1f2;
}
.progress-sm {
  height: 8px;
}
.progress-bar.active,
.progress.active .progress-bar {
  animation: 2s linear 0s normal none infinite running progress-bar-stripes;
}
.progress-vertical {
  display: inline-block;
  height: 250px;
  margin-bottom: 0;
  margin-right: 20px;
  min-height: 250px;
  position: relative;
}
.progress-vertical-bottom {
  display: inline-block;
  height: 250px;
  margin-bottom: 0;
  margin-right: 20px;
  min-height: 250px;
  position: relative;
  transform: rotate(180deg);
}
.progress-animated {
  animation-duration: 5s;
  animation-name: myanimation;
  transition: all 5s ease 0s;
}
@keyframes myanimation {
  0% {
    width: 0;
  }
}
@keyframes myanimation {
  0% {
    width: 0;
  }
}
/* TO DO LIST
================================================== */
/* WebKit browsers */
/* Mozilla Firefox 4 to 18 */
/* Mozilla Firefox 19+ */
/* Internet Explorer 10+ */
.tdl-holder {
  margin: 0 auto;
}
.tdl-holder ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
.tdl-holder li {
  background-color: transparent;
  border-bottom: 1px solid #e7e7e7;
  color: #868e96;
  list-style: outside none none;
  margin: 0;
  padding: 0;
}
.tdl-holder li span {
  margin-left: 30px;
  font-family: 'Roboto', sans-serif;
  vertical-align: middle;
  -webkit-transition: all 0.2s linear;
  -moz-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  transition: all 0.2s linear;
}
.tdl-holder label {
  cursor: pointer;
  display: block;
  line-height: 51px;
  padding: 0 15px;
  position: relative;
  margin: 0 !important;
}
.tdl-holder label:hover {
  background-color: #eef5f9;
  color: #868e96;
}
.tdl-holder label:hover a {
  display: block;
}
.tdl-holder label a {
  border-radius: 50%;
  color: #868e96;
  display: none;
  float: right;
  font-weight: bold;
  line-height: normal;
  height: 16px;
  margin-top: 15px;
  text-align: center;
  text-decoration: none;
  width: 16px;
  -webkit-transition: all 0.2s linear;
  -moz-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  transition: all 0.2s linear;
}
.tdl-holder input[type="checkbox"] {
  cursor: pointer;
  opacity: 0;
  position: absolute;
}
.tdl-holder input[type="checkbox"] + i {
  background-color: #ffffff;
  border: 1px solid #e7e7e7;
  display: block;
  height: 18px;
  position: absolute;
  top: 15px;
  width: 18px;
  z-index: 1;
}
.tdl-holder input[type="checkbox"]:checked + i::after {
  content: "\e64c";
  font-family: 'themify';
  display: block;
  left: 0;
  position: absolute;
  top: -17px;
  z-index: 2;
}
.tdl-holder input[type="checkbox"]:checked ~ span {
  color: #868e96;
  text-decoration: line-through;
}
.tdl-holder input[type="text"] {
  background-color: #eef5f9;
  height: 40px;
  margin-top: 20px;
  font-size: 14px;
}
.datamap-sales-hover-tooltip {
  background: #545454;
  font-family: 'Roboto', sans-serif;
  padding: 5px 10px;
  color: #ffffff;
  font-weight: 400;
  font-size: 12px;
  text-transform: capitalize;
  border-radius: 3px;
}
thead tr th {
  color: #373757;
  font-weight: 500;
}
thead tr th:last-child {
  text-align: right;
}
tbody tr th {
  color: #373757;
  font-family: 'Roboto', sans-serif;
  font-weight: normal;
}
tbody tr td {
  font-family: 'Roboto', sans-serif;
  color: #868e96;
}
tbody tr td:last-child {
  text-align: right;
}
.table > tbody > tr > td,
.table > tbody > tr > th,
.table > tfoot > tr > td,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > thead > tr > th {
  line-height: 32px;
  vertical-align: top;
}
.table > thead > tr > th {
  border-bottom: 1px solid #e7e7e7;
  font-weight: 600;
  border-top: 0;
}
.table {
  margin-bottom: 0;
}
.table .badge {
  text-transform: uppercase;
}
.student-data-table label {
  margin-right: 7px;
}
.student-data-table td span a {
  padding: 3px;
}
.search-action {
  bottom: 0;
  display: inline-block;
  position: absolute;
  right: 92px;
  text-align: right;
}
.search-type .form-control {
  height: 30px;
}
@media (max-width: 1199px) {
  .search-action {
    text-align: center;
    position: relative;
    right: 0;
  }
  .search-type .form-control {
    margin-bottom: 8px;
    margin-top: 8px;
  }
}
.table td,
.table th {
  padding: 0.55rem;
}
.table .round-img img {
  width: 38px;
}
.current-progress {
  margin-top: 15px;
}
.progress-content:last-child {
  margin-bottom: 0;
}
.current-progressbar {
  margin-top: 3px;
}
.current-progressbar .progress {
  height: 15px;
  margin: 0;
  box-shadow: none;
}
.current-progressbar .progress-bar {
  box-shadow: 0;
  line-height: 14px;
  font-size: 11px;
  box-shadow: none;
}
.login-logo {
  text-align: center;
  margin-bottom: 15px;
}
.login-logo span {
  color: #ffffff;
  font-size: 24px;
}
.login-logo img {
  height: 75px;
}
.login-content {
  margin: 100px 0;
}
.login-form {
  background: #ffffff;
  padding: 30px 30px 20px;
  border-radius: 2px;
}
.login-form h4 {
  color: #373757;
  text-align: center;
  margin-bottom: 50px;
}
.login-form .checkbox {
  color: #373757;
}
.login-form .checkbox label {
  text-transform: none;
}
.login-form .btn {
  width: 100%;
  text-transform: uppercase;
  font-size: 14px;
  padding: 15px;
  border: 0px;
}
.login-form label {
  color: #373757;
  text-transform: uppercase;
}
.login-form label a {
  color: #5873fe;
}
.social-login-content {
  margin: 0px -30px;
  border-top: 1px solid #e7e7e7;
  border-bottom: 1px solid #e7e7e7;
  padding: 30px 0px;
  background: #fcfcfc;
}
.social-button {
  padding: 0 30px;
}
.social-button i {
  padding: 19px;
}
.register-link a {
  color: #5873fe;
}
.cpu-load {
  width: 100%;
  height: 272px;
  font-size: 14px;
  line-height: 1.2em;
}
.cpu-load-data-content {
  font-size: 18px;
  font-weight: 400;
  line-height: 40px;
}
.cpu-load-data {
  margin-bottom: 30px;
}
.cpu-load-data li {
  display: inline-block;
  width: 32.5%;
  text-align: center;
  border-right: 1px solid #e7e7e7;
}
.cpu-load-data li:last-child {
  border-right: 0px;
}
#barChart {
  height: 400px!important;
}
.nestable-cart {
  overflow: hidden;
}
.dd-handle,
.dd3-content {
  color: #000!important;
}
.user-work h4,
.user-skill h4 {
  font-size: 14px;
  position: relative;
  margin-bottom: 15px;
  padding: 5px 0px;
  border-bottom: 1px solid #e7e7e7;
  font-family: 'Roboto', sans-serif;
}
.work-content {
  margin-bottom: 15px;
}
.work-content h3 {
  font-size: 15px;
  margin-bottom: 5px;
}
.user-skill li a {
  line-height: 25px;
}
.user-profile-name {
  display: inline-block;
  font-size: 22px;
  font-weight: 500;
  padding: 0px 15px;
}
.user-Location {
  display: inline-block;
  font-size: 12px;
  margin-left: 10px;
  font-family: 'Roboto', sans-serif;
}
.user-Location i {
  font-size: 14px;
}
.user-job-title {
  font-size: 14px;
  padding-bottom: 5px;
  padding-left: 15px;
  color: #5873fe;
}
.ratings h4 {
  font-size: 12px;
  text-transform: uppercase;
  padding-top: 10px;
  padding-bottom: 2px;
  padding-left: 15px;
}
.ratings span {
  margin-right: 10px;
}
.rating-star {
  margin-bottom: 10px;
  padding-left: 15px;
}
.user-send-message {
  margin-top: 15px;
  padding-left: 15px;
}
.user-profile-tab {
  margin-top: 15px;
  padding: 0px 15px;
}
.user-profile-tab li a {
  padding: 7px 40px 7px 0px;
}
.contact-information,
.basic-information {
  margin: 10px 0px;
}
.contact-information h4,
.basic-information h4 {
  font-size: 12px;
  text-transform: uppercase;
  padding-top: 10px;
  padding-bottom: 15px;
  font-family: 'Roboto', sans-serif;
}
.contact-title {
  display: inline-block;
  padding-bottom: 15px;
  width: 170px;
  font-size: 16px;
  color: #868e96;
}
.phone-number,
.mail-address,
.contact-email,
.contact-website,
.contact-skype,
.birth-date,
.gender {
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
  color: #373757;
}
.profile-widget {
  margin: 8px 0;
  text-align: center;
}
.profile-widget .stat-text {
  padding-bottom: 6px;
}
.profile-widget-one .profile-one-bg {
  position: relative;
}
.profile-widget-one .profile-one-user-photo {
  position: relative;
}
.profile-widget-one .profile-one-user-photo .bg-overlay {
  background: rgba(0, 0, 0, 0.6);
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
}
.profile-widget-one .profile-one-user-photo .user-photo {
  bottom: 0;
  height: 100%;
  position: absolute;
  text-align: center;
  top: 0;
  width: 100%;
}
.profile-widget-one .profile-one-user-photo .user-photo img {
  border-radius: 100px;
  height: 100px;
  position: relative;
  top: 50%;
  transform: translateY(-50%);
  width: 100px;
}
.profile-widget-one .profile-one-user-content ul li {
  background: #ffffff;
  border-right: 1px solid #e7e7e7;
  border-bottom: 1px solid #e7e7e7;
  display: block;
  float: left;
  padding: 10px 0;
  text-align: center;
  width: 32%;
}
.profile-widget-one .profile-one-user-content ul li:last-child {
  border-right: 0px;
}
.profile-widget-one .profile-one-user-content h4 {
  line-height: 30px;
  font-size: 14px;
  margin: 0px;
}
.profile-widget-one .profile-one-user-content .earning-amount,
.profile-widget-one .profile-one-user-content .sold-amount {
  color: #28a745;
  font-size: 24px;
  font-weight: 400;
  margin-top: 10px;
}
.profile-widget-one .profile-one-user-content .sold-amount {
  color: #5873fe;
  font-size: 24px;
  font-weight: 400;
  margin-top: 10px;
}
.profile-widget-one .profile-one-user-button {
  text-align: center;
  padding: 26px 0px;
}
.profile-widget-one .profile-btn-one {
  font-size: 18px;
  text-transform: uppercase;
  padding: 8px 15px;
  font-weight: 400;
  color: #5873fe;
}
/*Aleart
-------------*/
.alert-primary {
  background-color: #b3c0ff;
  border-color: #b3c0ff;
  color: #5873fe;
}
.alert-success {
  background-color: #71dd8a;
  border-color: #71dd8a;
  color: #28a745;
}
.alert-warning {
  background-color: #f5e0ac;
  border-color: #f5e0ac;
  color: #e7b63a;
}
.alert-danger {
  background-color: #efa2a9;
  border-color: #efa2a9;
  color: #dc3545;
}
.alert-pink {
  background-color: #f8e4fb;
  border-color: #f8e4fb;
  color: #e6a1f2;
}
.alert-dismissable .close,
.alert-dismissible .close {
  color: rgba(0, 0, 0, 0.8);
}
/*    Labels
------------------*/
.label-default {
  background-color: #878787;
}
.label-primary {
  background-color: #5873fe;
}
.label-success {
  background-color: #28a745;
}
.label-info {
  background-color: #03a9f4;
}
.label-danger {
  background-color: #dc3545;
}
.label-warning {
  background-color: #e7b63a;
}
/* Calendar
================================================== */
/* =============
   Calendar
============= */
.calendar {
  float: left;
  margin-bottom: 0px;
}
.fc-view {
  margin-top: 30px;
}
.none-border .modal-footer {
  border-top: none;
}
.fc-toolbar {
  margin-bottom: 5px;
  margin-top: 15px;
}
.fc-toolbar h2 {
  font-size: 18px;
  font-weight: 600;
  line-height: 30px;
  text-transform: uppercase;
}
.fc-day {
  background: #ffffff;
}
.fc-toolbar .fc-state-active,
.fc-toolbar .ui-state-active,
.fc-toolbar button:focus,
.fc-toolbar button:hover,
.fc-toolbar .ui-state-hover {
  z-index: 0;
}
.fc-widget-header {
  border: 1px solid #e7e7e7;
}
.fc-widget-content {
  border: 1px solid #e7e7e7;
}
.fc th.fc-widget-header {
  background: #e7e7e7;
  font-size: 14px;
  line-height: 20px;
  padding: 10px 0px;
  text-transform: uppercase;
}
.fc-button {
  background: #ffffff;
  border: 1px solid #e7e7e7;
  color: #373757;
  text-transform: capitalize;
}
.fc-text-arrow {
  font-family: inherit;
  font-size: 16px;
}
.fc-state-hover {
  background: #eef5f9 !important;
}
.fc-state-highlight {
  background: #eef5f9 !important;
}
.fc-cell-overlay {
  background: #eef5f9 !important;
}
.fc-unthemed .fc-today {
  background: #ffffff !important;
}
.fc-event {
  border-radius: 2px;
  border: none;
  cursor: move;
  font-size: 13px;
  margin: 5px 7px;
  padding: 5px 5px;
  text-align: center;
}
.external-event {
  color: #ffffff;
  cursor: move;
  margin: 10px 0;
  padding: 6px 10px;
}
.fc-basic-view td.fc-week-number span {
  padding-right: 5px;
}
.fc-basic-view td.fc-day-number {
  padding-right: 5px;
}
#drop-remove {
  margin: 0px;
  top: 3px;
}
#event-modal .modal-dialog,
#add-category .modal-dialog {
  max-width: 600px;
}
.flotTip {
  background: #252525;
  border: 1px solid #252525;
  padding: 5px 15px;
  color: #ffffff;
}
.flot-container {
  box-sizing: border-box;
  width: 100%;
  height: 275px;
  padding: 20px 15px 15px;
  margin: 15px auto 30px;
  background: transparent;
}
.flot-pie-container {
  height: 275px;
}
.flotBar-container {
  height: 275px;
}
.flot-line {
  width: 100%;
  height: 100%;
  font-size: 14px;
  line-height: 1.2em;
}
.legend table {
  border-spacing: 5px;
}
#chart1,
#flotBar,
#flotCurve {
  width: 100%;
  height: 275px;
}
.morris-hover {
  position: absolute;
  z-index: 1;
}
.morris-hover.morris-default-style .morris-hover-row-label {
  font-weight: bold;
  margin: 0.25em 0;
}
.morris-hover.morris-default-style .morris-hover-point {
  white-space: nowrap;
  margin: 0.1em 0;
}
.morris-hover.morris-default-style {
  border-radius: 2px;
  padding: 10px 12px;
  color: #666;
  background: rgba(0, 0, 0, 0.7);
  border: none;
  color: #fff!important;
}
.morris-hover-point {
  color: rgba(255, 255, 255, 0.8) !important;
}
#morris-bar-chart {
  height: 285px;
}
.products_1 {
  padding-top: 5px;
  padding-bottom: 5px;
}
.products_1 .pr_img_price {
  position: relative;
}
.products_1 .pr_img_price .product_price {
  min-width: 50px;
  min-height: 50px;
  background: #28a745;
  border-radius: 100%;
  position: absolute;
  top: 0;
  right: 0;
}
.products_1 .pr_img_price .product_price p {
  padding-top: 15px;
  color: #ffffff;
  font-size: 14px;
  font-weight: 600;
}
.products_1 .product_details .product_name {
  padding-top: 30px;
}
.products_1 .product_details .prdt_add_to_cart {
  padding-top: 10px;
}
.products_1 .product_details .prdt_add_to_cart button {
  padding: 10px 20px;
  text-transform: uppercase;
  font-weight: 600;
}
.product-2-details .table > tbody > tr > td {
  border: none;
}
.product-2-details .product-2-des {
  margin-top: 25px;
}
.product-2-details .product-2-des .product_name h4 {
  font-size: 15px;
  font-weight: 600;
}
.product-2-details .product-2-des .product_des p {
  font-size: 13px;
  font-style: italic;
}
.product-2-details .product-2-button {
  border-left: 1px solid #e7e7e7;
  margin-top: 25px;
}
.product-2-details .product-2-button .prdt_add_to_curt {
  padding-top: 10px;
}
.product-2-details .product-2-button .prdt_add_to_curt button {
  font-size: 11px;
  text-transform: uppercase;
  font-weight: 600;
}
.product-3-img img {
  width: 100%;
}
.product_details_3 {
  padding: 15px 0px;
}
.product_details_3 .product_name h4 {
  font-size: 15px;
  font-weight: 600;
}
.product_details_3 .product_des {
  padding-bottom: 5px;
}
.product_details_3 .prdt_add_to_curt {
  padding-top: 10px;
}
.product_details_3 .prdt_add_to_curt button {
  text-transform: uppercase;
  font-weight: 600;
}
.favourite-menu-details .table > tbody > tr > td {
  border-top: none;
  border-bottom: 1px solid #e7e7e7;
}
.favourite-menu-details .favourite-menu-img {
  border-right: 1px solid #e7e7e7;
  margin-bottom: 25px;
  width: 120px;
}
.favourite-menu-details .favourite-menu-des {
  margin-top: 40px;
  margin-right: 465px;
}
.favourite-menu-details .favourite-menu-des .product_name h4 {
  font-weight: 600;
  text-align: left;
}
.favourite-menu-details .favourite-menu-button {
  margin-top: 40px;
}
.favourite-menu-details .favourite-menu-button .prdt_add_to_curt {
  padding-top: 10px;
}
.favourite-menu-details .favourite-menu-button .prdt_add_to_curt button {
  font-size: 11px;
  text-transform: uppercase;
  font-weight: 600;
}
.order-list-item table tbody > tr > td {
  padding-top: 8px;
  border-top: 1px solid #e7e7e7;
}
.order-list-item table thead > tr > th {
  border-bottom: 1px solid #e7e7e7;
}
.order-list-item thead {
  background: #5873fe;
  text-align: left;
}
.order-list-item thead th {
  color: #ffffff;
  font-weight: bold;
}
.order-list-item tbody {
  background: #ffffff;
  text-align: left;
}
.order-list-item tbody td {
  color: #444444;
}
.booking-system-feedback {
  top: 5px !important;
  right: 15px;
}
.booking-system-top {
  padding-top: 15px;
}
.media-body {
  vertical-align: middle;
}
.media-body span {
  font-size: 10px;
  color: #5873fe;
}
.media-body p {
  color: #868e96;
  line-height: 15px;
}
.example {
  overflow: hidden;
  border: 1px solid #e7e7e7;
  -webkit-box-shadow: 1px 1px 2px 0px rgba(200, 200, 200, 0.3);
  -moz-box-shadow: 1px 1px 2px 0px rgba(200, 200, 200, 0.3);
  box-shadow: 1px 1px 2px 0px rgba(200, 200, 200, 0.3);
  background-color: #eef5f9;
  text-align: justify;
}
.example p {
  padding: 20px 20px 0px 20px;
  font-size: 12px;
}
.box,
.simple {
  height: 300px;
}
.scrollable-auto-x {
  overflow-x: auto;
  overflow-y: hidden;
}
.scrollable-auto-y {
  overflow-y: auto;
  overflow-x: hidden;
}
.scrollable-auto {
  overflow: auto;
}
.vmap {
  width: 100%;
  height: 400px;
}
.dark-browse-input-box {
  border-radius: 0;
  -webkit-border-radius: 0 !important;
  -moz-border-radius: 0 !important;
  -webkit-box-shadow: none !important;
  -moz-box-shadow: none !important;
  box-shadow: none !important;
  font-size: 12px;
  color: #000000;
  border: 1px solid #e7e7e7;
}
.dark-browse-input-box .dark-input-button {
  border-radius: 0;
  -webkit-border-radius: 0 !important;
  -moz-border-radius: 0 !important;
  background: #ffffff;
  border: none !important;
  color: #5873fe;
}
.dark-browse-input-box .dark-input-button i {
  font-weight: bold;
  font-size: 17px;
}
.dark-browse-input-box .dark-input-button:hover {
  background: #ffffff;
  color: #5873fe;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
  border: none !important;
}
.dark-browse-input-box .dark-input-button:focus {
  outline: none;
  border: none !important;
  background: none !important;
}
.file-input {
  position: relative;
  font-size: 14px;
}
.file-input label {
  position: absolute;
  top: -2px;
  right: 0;
  bottom: 0;
  margin: 0;
}
.file-input label:focus {
  outline: none;
  border: none !important;
  background: none !important;
}
.file-input .btn {
  position: absolute;
  right: 6px;
  top: 7px;
  bottom: 6px;
  max-width: 100px;
  padding-top: 0;
  padding-bottom: 0;
  font-size: 12px;
  line-height: 32px;
}
.file-input .btn input {
  width: 0;
  height: 0;
}
.file-input .file-name {
  float: left;
  width: 100%;
  border: 0;
  background: transparent;
}
.media-stats-content .stats-content {
  padding: 30px 0px;
}
.media-stats-content .stats-content .stats-digit {
  font-size: 24px;
  font-weight: 300;
  margin-bottom: 10px;
}
.media-stats-content .stats-content .stats-text {
  font-size: 14px;
}
.media-stats-content .stats-content .table td {
  line-height: 40px!important;
}
.carousel.vertical .carousel-inner {
  position: relative;
  overflow: hidden;
  width: 100%;
}
.carousel.vertical .carousel-inner > .item {
  display: none;
  position: relative;
  transition: top 0.6s ease-in-out;
}
.carousel.vertical .carousel-inner > .item > img,
.carousel.vertical .carousel-inner > .item > a > img {
  line-height: 1;
}
@media all and (transform-3d), (-webkit-transform-3d) {
  .carousel.vertical .carousel-inner > .item {
    transition: transform 0.6s ease-in-out;
    backface-visibility: hidden;
    perspective: 1000;
  }
  .carousel.vertical .carousel-inner > .item.next,
  .carousel.vertical .carousel-inner > .item.active.right {
    transform: translate3d(0, 100%, 0);
    top: 0;
  }
  .carousel.vertical .carousel-inner > .item.prev,
  .carousel.vertical .carousel-inner > .item.active.left {
    transform: translate3d(0, -100%, 0);
    top: 0;
  }
  .carousel.vertical .carousel-inner > .item.next.left,
  .carousel.vertical .carousel-inner > .item.prev.right,
  .carousel.vertical .carousel-inner > .item.active {
    transform: translate3d(0, 0, 0);
    top: 0;
    width: 100%;
  }
}
.carousel.vertical .carousel-inner > .active,
.carousel.vertical .carousel-inner > .next,
.carousel.vertical .carousel-inner > .prev {
  display: block;
}
.carousel.vertical .carousel-inner > .active {
  top: 0;
}
.carousel.vertical .carousel-inner > .next,
.carousel.vertical .carousel-inner > .prev {
  position: absolute;
  top: 0;
  width: 100%;
}
.carousel.vertical .carousel-inner > .next {
  top: 100%;
}
.carousel.vertical .carousel-inner > .prev {
  top: -100%;
}
.carousel.vertical .carousel-inner > .next.left,
.carousel.vertical .carousel-inner > .prev.right {
  top: 0;
}
.carousel.vertical .carousel-inner > .active.left {
  top: -100%;
}
.carousel.vertical .carousel-inner > .active.right {
  top: 100%;
}
.ct-chart {
  height: 265px;
}
.ct-pie-chart {
  height: 328px;
}
.ct-svg-chart {
  height: 270px;
}
.ct-bar-chart {
  height: 250px;
}
.ct-label {
  color: rgba(0, 0, 0, 0.8);
  fill: rgba(0, 0, 0, 0.8);
  font-size: 10px;
}
.ct-chart-pie .ct-label {
  color: rgba(0, 0, 0, 0.8);
  fill: rgba(0, 0, 0, 0.8);
  font-size: 12px;
}
.ct-series-a .ct-bar,
.ct-series-a .ct-line,
.ct-series-a .ct-point,
.ct-series-a .ct-slice-donut {
  stroke: #28A745;
}
.ct-series-b .ct-bar,
.ct-series-b .ct-line,
.ct-series-b .ct-point,
.ct-series-b .ct-slice-donut {
  stroke: #007BFF;
}
.ct-series-c .ct-bar,
.ct-series-c .ct-line,
.ct-series-c .ct-point,
.ct-series-c .ct-slice-donut {
  stroke: #e6a1f2;
}
.ct-series-d .ct-bar,
.ct-series-d .ct-line,
.ct-series-d .ct-point,
.ct-series-d .ct-slice-donut {
  stroke: #e7b63a;
}
.ct-series-a .ct-area,
.ct-series-a .ct-slice-donut-solid,
.ct-series-a .ct-slice-pie {
  fill: #28A745;
}
.ct-series-b .ct-area,
.ct-series-b .ct-slice-donut-solid,
.ct-series-b .ct-slice-pie {
  fill: #007BFF;
}
.ct-series-c .ct-area,
.ct-series-c .ct-slice-donut-solid,
.ct-series-c .ct-slice-pie {
  fill: #e6a1f2;
}
body {
  font-family: 'Roboto', sans-serif;
  background: rgba(88, 115, 254, 0.04);
  color: #868e96;
  font-size: 14px;
}
a,
button {
  outline: none!important;
  text-decoration: none!important;
  color: #868e96;
  transition: all 0.2s ease 0s;
}
a.active,
button.active,
a:focus,
button:focus,
a:hover,
button:hover {
  color: #252525;
  outline: none!important;
  text-decoration: none!important;
}
ul {
  padding: 0;
  margin: 0;
}
li {
  list-style: none;
}
p {
  font-family: 'Roboto', sans-serif;
  color: #868e96;
}
.h2,
.h3,
.h4,
.h5,
.h6,
h1,
h2,
h3,
h4,
h5,
h6.h1 {
  color: #373757;
}
.dib {
  display: inline-block;
}
.rotate-90 {
  transform: rotate(90deg);
}
.rotate-180 {
  transform: rotate(180deg);
}
.alert h4 {
  color: #373757;
}
.border-none {
  border: 1px solid transparent;
}
.footer > p {
  margin-top: 15px;
  padding: 15px;
  text-align: left;
}
.footer > p a {
  color: #5873fe;
}
.bar-hidden {
  overflow-X: hidden;
}
.color-white {
  color: #ffffff;
}
.btn-btn {
  padding: 15px 25px;
  border: 0;
}
.btn-btn:hover {
  color: #ffffff;
}
.letter-space {
  letter-spacing: 1px;
}
.solid-btn {
  padding: 15px 42px;
}
.box-shadow {
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}
/*    Color Mixins
-------------------*/
.color-primary,
.text-primary {
  color: #5873fe;
}
.color-success,
.text-success {
  color: #28a745;
}
.color-info,
.text-info {
  color: #03a9f4;
}
.color-danger,
.text-danger {
  color: #dc3545;
}
.color-warning,
.text-warning {
  color: #e7b63a;
}
.color-pink,
.text-pink {
  color: #e6a1f2;
}
.color-dark,
.text-dark {
  color: #545454;
}
.color-grey,
.text-grey {
  color: #ddd;
}
/*    Mixins
--------------------------*/
.pr {
  position: relative;
}
.pa {
  position: absolute;
}
/*    Background Mixins
--------------------------*/
.bg-primary {
  background: #5873fe;
  color: #ffffff;
  fill: #5873fe;
}
.bg-success {
  background: #28a745;
  color: #ffffff;
  fill: #28a745;
}
.bg-info {
  background: #03a9f4;
  color: #ffffff;
  fill: #03a9f4;
}
.bg-danger {
  background: #dc3545;
  color: #ffffff;
  fill: #dc3545;
}
.bg-warning {
  background: #e7b63a;
  color: #ffffff;
  fill: #e7b63a;
}
.bg-pink {
  background: #e6a1f2;
  color: #ffffff;
  fill: #e6a1f2;
}
.bg-dark {
  background: #545454;
  color: #ffffff;
  fill: #545454;
}
.bg-transparent {
  background: transparent;
  color: #252525;
}
.no-select-arrow {
  -moz-appearance: none !important;
  -webkit-appearance: none !important;
  border: 1px solid #e7e7e7;
}
.bg-ash {
  background: #f5f5f5;
}
.bg-white {
  background: #ffffff;
}
/*    Border Mixins
--------------------------*/
.border-primary {
  border-color: #5873fe;
}
.border-success {
  border-color: #28a745;
}
.border-info {
  border-color: #03a9f4;
}
.border-danger {
  border-color: #dc3545;
}
.border-warning {
  border-color: #e7b63a;
}
.border-pink {
  border-color: #e6a1f2;
}
.border-dark {
  border-color: #545454;
}
.no-border {
  border: 0px!important;
}
.border-top {
  border-top: 1px solid #e7e7e7;
}
.border-white {
  border: 1px solid #ffffff;
}
.border-bottom {
  border-bottom: 1px solid #e7e7e7;
}
.border-left {
  border-left: 1px solid #e7e7e7;
}
.border-right {
  border-right: 1px solid #e7e7e7;
}
.white-bottom {
  border-bottom: 1px solid #ffffff;
}
.radius-0 {
  border-radius: 0;
}
/*    Brand Background
-----------------------------*/
.bg-facebook {
  background: #3b5998;
  fill: #3b5998;
}
.bg-twitter {
  background: #1da1f2;
  fill: #1da1f2;
}
.bg-youtube {
  background: #cd201f;
  fill: #cd201f;
}
.bg-google-plus {
  background: #dd4b39;
  fill: #dd4b39;
}
.bg-linkedin {
  background: #007bb6;
}
/*    Gradient
-----------------------------*/
.liner-gradient-primary {
  background: linear-gradient(to right, rgba(253, 77, 54, 0.7), #fd4d36);
}
/*    width
-----------------------------*/
.w10pr {
  width: 10%;
}
.w12pr {
  width: 12%;
}
.p-28 {
  padding: 28px;
}
.p-10 {
  padding: 10px;
}
/*    Chart Spanrkline
-------------------------*/
.jqstooltip {
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
}
/*    Bootstrap class
---------------------------*/
@media (min-width: 1500px) {
  .container {
    width: 1400px;
  }
}
.row {
  margin-left: -7.5px;
  margin-right: -7.5px;
}
.col-lg-1,
.col-lg-10,
.col-lg-11,
.col-lg-12,
.col-lg-2,
.col-lg-3,
.col-lg-4,
.col-lg-5,
.col-lg-6,
.col-lg-7,
.col-lg-8,
.col-lg-9,
.col-md-1,
.col-md-10,
.col-md-11,
.col-md-12,
.col-md-2,
.col-md-3,
.col-md-4,
.col-md-5,
.col-md-6,
.col-md-7,
.col-md-8,
.col-md-9,
.col-sm-1,
.col-sm-10,
.col-sm-11,
.col-sm-12,
.col-sm-2,
.col-sm-3,
.col-sm-4,
.col-sm-5,
.col-sm-6,
.col-sm-7,
.col-sm-8,
.col-sm-9,
.col-xs-1,
.col-xs-10,
.col-xs-11,
.col-xs-12,
.col-xs-2,
.col-xs-3,
.col-xs-4,
.col-xs-5,
.col-xs-6,
.col-xs-7,
.col-xs-8,
.col-xs-9 {
  padding-top: 7.5px;
  padding-bottom: 7.5px;
}
@media (max-width: 667px) {
  .dt-buttons {
    margin-left: 10px;
  }
}
@media (max-width: 480px) {
  .dt-buttons {
    display: inline-block;
  }
}
.pace {
  -webkit-pointer-events: none;
  pointer-events: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}
.pace-inactive {
  display: none;
}
.pace .pace-progress {
  background: #28a745;
  position: fixed;
  z-index: 2000;
  top: 0;
  right: 100%;
  width: 100%;
  height: 2px;
}
.pace .pace-progress-inner {
  display: block;
  position: absolute;
  right: 0px;
  width: 100px;
  height: 100%;
  box-shadow: 0 0 10px #29d, 0 0 5px #29d;
  opacity: 1.0;
  -webkit-transform: rotate(3deg) translate(0px, -4px);
  -moz-transform: rotate(3deg) translate(0px, -4px);
  -ms-transform: rotate(3deg) translate(0px, -4px);
  -o-transform: rotate(3deg) translate(0px, -4px);
  transform: rotate(3deg) translate(0px, -4px);
}
.pace .pace-activity {
  display: block;
  position: fixed;
  z-index: 2000;
  top: 5px;
  right: 5px;
  width: 14px;
  height: 14px;
  border: solid 2px transparent;
  border-top-color: #28a745;
  border-left-color: #28a745;
  border-radius: 10px;
  -webkit-animation: pace-spinner 400ms linear infinite;
  -moz-animation: pace-spinner 400ms linear infinite;
  -ms-animation: pace-spinner 400ms linear infinite;
  -o-animation: pace-spinner 400ms linear infinite;
  animation: pace-spinner 400ms linear infinite;
}
@-webkit-keyframes pace-spinner {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes pace-spinner {
  0% {
    -moz-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -moz-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes pace-spinner {
  0% {
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-ms-keyframes pace-spinner {
  0% {
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -ms-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes pace-spinner {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
.superpose {
  color: #EEE;
  height: 350px;
  width: 100%;
}
.superclock {
  position: relative;
  width: 300px;
  margin: auto;
}
.superclock1 {
  position: absolute;
  left: 10px;
  top: 10px;
}
.superclock2 {
  position: absolute;
  left: 60px;
  top: 60px;
}
.superclock3 {
  position: absolute;
  left: 110px;
  top: 110px;
}
#search {
  position: fixed;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7);
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-transform: translate(0px, -100%) scale(0, 0);
  -moz-transform: translate(0px, -100%) scale(0, 0);
  -o-transform: translate(0px, -100%) scale(0, 0);
  -ms-transform: translate(0px, -100%) scale(0, 0);
  transform: translate(0px, -100%) scale(0, 0);
  z-index: 99999;
  opacity: 0;
}
#search.open {
  -webkit-transform: translate(0px, 0px) scale(1, 1);
  -moz-transform: translate(0px, 0px) scale(1, 1);
  -o-transform: translate(0px, 0px) scale(1, 1);
  -ms-transform: translate(0px, 0px) scale(1, 1);
  transform: translate(0px, 0px) scale(1, 1);
  opacity: 1;
}
#search input[type="search"] {
  position: absolute;
  top: 50%;
  width: 100%;
  color: #ffffff;
  background: rgba(0, 0, 0, 0);
  font-size: 60px;
  font-weight: 300;
  text-align: center;
  border: 0px;
  margin: 0px auto;
  margin-top: -51px;
  padding-left: 30px;
  padding-right: 30px;
  outline: none;
}
#search .btn {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: 61px;
  margin-left: -45px;
}
#search .close {
  position: fixed;
  top: 15px;
  right: 15px;
  color: #fff;
  background-color: #428bca;
  border-color: #357ebd;
  opacity: 1;
  padding: 10px 17px;
  font-size: 27px;
}
.media-text-right {
  text-align: right;
}
.media-text-left {
  text-align: left;
}
.boxshadow-none {
  box-shadow: none;
}
.progress-sm {
  height: 8px;
}
.bg-warning-dark {
  background: #e7b63a;
}
.bg-info-dark {
  background: #8b67c9;
}
.bg-danger-dark {
  background: #e63327;
}
.bg-success-dark {
  background: #2ed3aa;
}
.bg-primary-dark {
  background: #0095e1;
}
.widget-card-circle i {
  font-size: 30px;
  left: 0;
  line-height: 97px;
  right: 0;
  text-align: center;
}
.widget-line-list li {
  display: inline-block;
  font-size: 1.2em;
  line-height: 27px;
  padding: 5px 20px 0 15px;
}
.widget-line-list li span {
  font-size: 12px;
}
.height-150 {
  height: 150px;
}
.social-connect ul li {
  display: inline-block;
}
.social-connect ul li a {
  display: inline-block;
  margin: 0 5px;
  padding: 12px 15px;
  border-radius: 4px;
}
.user-card-absolute {
  top: 115px;
  left: 0;
  right: 0;
}
.social-pad {
  padding: 40px 30px 110px;
}
.round-img img {
  border-radius: 100px;
}
.blockquote-box {
  border-right: 5px solid #E6E6E6;
  margin-bottom: 25px;
}
.blockquote-box .square {
  width: 100px;
  min-height: 50px;
  margin-right: 22px;
  text-align: center!important;
  background-color: #E6E6E6;
  padding: 20px 0;
}
.blockquote-box .blockquote-primary {
  border-color: #5873fe;
}
.blockquote-box .blockquote-primary .square {
  background-color: #5873fe;
  color: #ffffff;
}
.blockquote-box .blockquote-success {
  border-color: #28a745;
}
.blockquote-box .blockquote-success .square {
  background-color: #28a745;
  color: #ffffff;
}
.blockquote-box .blockquote-info {
  border-color: #03a9f4;
}
.blockquote-box .blockquote-info .square {
  background-color: #03a9f4;
  color: #ffffff;
}
.blockquote-box .blockquote-warning {
  border-color: #e7b63a;
}
.blockquote-box .blockquote-warning .square {
  background-color: #e7b63a;
  color: #ffffff;
}
.blockquote-box .blockquote-danger {
  border-color: #d43f3a;
}
.blockquote-box .blockquote-danger .square {
  background-color: #dc3545;
  color: #ffffff;
}
/*
/* Version: 1.0
*/
/*-------- css code for responsive layout  --------*/
/*  To make Responsive
---------------------------------------------------------------------- /
*	1 - media screen and (max-width: 1750px)
*   2 - media screen and (max-width: 1680px)
*   3 - media screen and (max-width: 1280px)
*   4 - media screen and (max-width: 1199px)
*   5 - media screen and (max-width: 1024px)
*   6 - media screen and (max-width: 991px)
*   7 - media screen and (max-width: 767px)
*   8 - media screen and (max-width: 680px)
*   9 - media screen and (max-width: 480px)
*   10 - media screen and (max-width: 320px)
*
---------------------------------------------------------------------- */
/*  1 - media screen and (max-width: 1750px)
---------------------------------------------------------------------- */
/*  1 - media screen and (max-width: 1750px)
---------------------------------------------------------------------- */
/*  1 - media screen and (max-width: 1750px) End
---------------------------------------------------------------------- */
/*  2 - media screen and (max-width: 1680px)
---------------------------------------------------------------------- */
/*  2 - media screen and (max-width: 1680px) End
---------------------------------------------------------------------- */
/*  3 - media screen and (max-width: 1280px)
---------------------------------------------------------------------- */
/*  3 - media screen and (max-width: 1280px) End
---------------------------------------------------------------------- */
/*  4 - media screen and (max-width: 1199px)
---------------------------------------------------------------------- */
/*  4 - media screen and (max-width: 1199px) End
---------------------------------------------------------------------- */
/*  5 - media screen and (max-width: 1024px)
---------------------------------------------------------------------- */
@media (min-width: 992px) and (max-width: 1199px) {
  .title-margin-right {
    margin-right: 7px !important;
  }
  .title-margin-left {
    margin-left: 7px !important;
  }
}
/*  5 - media screen and (max-width: 1024px) End
---------------------------------------------------------------------- */
/*  6 - media screen and (max-width: 991px)
---------------------------------------------------------------------- */
@media (min-width: 768px) and (max-width: 991px) {
  .title-margin-right {
    margin-right: 7px !important;
  }
  .title-margin-left {
    margin-left: 7px !important;
  }
}
/*  6 - media screen and (max-width: 991px) End
---------------------------------------------------------------------- */
/*  7 - media screen and (max-width: 767px)
---------------------------------------------------------------------- */
@media (min-width: 680px) and (max-width: 767px) {
  .title-margin-right {
    margin-right: 7px !important;
  }
  .title-margin-left {
    margin-left: 7px !important;
  }
}
/*  7 - media screen and (max-width: 767px) End
---------------------------------------------------------------------- */
/*  8 - media screen and (max-width: 680px)
---------------------------------------------------------------------- */
@media (min-width: 480px) and (max-width: 679px) {
  .title-margin-right {
    margin-right: 7px !important;
  }
  .title-margin-left {
    margin-left: 7px !important;
  }
  .inbox-pagination {
    margin-top: 30px;
    float: left !important;
  }
  .card-badge .label {
    display: inline-block;
    margin-bottom: 5px;
    padding: 5px;
  }
  .mail-box .sm-side {
    width: 100%;
  }
  .mail-box aside {
    display: inline;
  }
}
/*  8 - media screen and (max-width: 680px) End
---------------------------------------------------------------------- */
/*  9 - media screen and (max-width: 480px)
---------------------------------------------------------------------- */
@media (min-width: 360px) and (max-width: 479px) {
  .title-margin-right {
    margin-right: 7px !important;
  }
  .title-margin-left {
    margin-left: 7px !important;
  }
  #project {
    margin-left: 0%;
  }
  .fc-toolbar .fc-right {
    float: left;
    margin-top: 15px;
  }
  .card-badge .label {
    display: inline-block;
    margin-bottom: 5px;
    padding: 5px;
  }
  .mail-box .sm-side {
    width: 100%;
  }
  .mail-box aside {
    display: inline;
  }
}
/*  9 - media screen and (max-width: 360px) End
---------------------------------------------------------------------- */
/*  10 - media screen and (max-width: 320px)
---------------------------------------------------------------------- */
@media (min-width: 320px) and (max-width: 359px) {
  .title-margin-right {
    margin-right: 7px !important;
  }
  .title-margin-left {
    margin-left: 7px !important;
  }
  #project {
    margin-left: 0%;
  }
  .fc-toolbar .fc-right {
    float: left;
    margin-top: 15px;
  }
  .br-theme-bars-pill .br-widget a {
    padding: 7px 12px;
  }
  .br-theme-bars-reversed .br-widget .br-current-rating {
    padding: 0px;
  }
  .alert-rating {
    padding-bottom: 40px;
  }
  .card-badge .label {
    display: inline-block;
    margin-bottom: 5px;
    padding: 5px;
  }
  .mail-box .sm-side {
    width: 100%;
  }
  .mail-box aside {
    display: inline;
  }
  .chk-group {
    margin-bottom: 10px;
  }
  .pagination-list {
    float: left !important;
    margin-top: 10px;
  }
  .inner-append {
    position: relative;
  }
  .inner-append .append-btn {
    position: absolute;
    right: 0;
    top: 0;
  }
  .input-text {
    margin-bottom: 12px;
  }
}
/*  10 - media screen and (max-width: 320px)
---------------------------------------------------------------------- */
/*---------------------------------------------------------------*/
/* Retina */
/*---------------------------------------------------------------*/
@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
  .default-logo {
    display: none !important;
  }
  .retina-logo {
    display: inline-block !important;
  }
}




    </style>

</head>
<body>
	<div id="page-wrap">
	<h1>Reporte Usuario</h1>
	<p></p>
	<table>
		<tr>
			<th>Nombre</th>
			<th>Gmail</th>
			<th>Rol</th>
			<th>Fecha de creacion</th>
		</tr>
    <?php foreach ($data as $r) { ?>
		<tr>
			<td><?= $r->name; ?></td>
			<td><?= $r->email; ?></td>
			<td><?= $r->rol; ?></td>
			<td><?= $r->created_at; ?></td>
		</tr>
    <?php  } ?>
	</table>
  <p><h4>Fecha <?=  $date; ?></h4></p>
  </div>
</body>
</html>
