

function load($ocLazyLoadProvider){
    console.log('test');
    $ocLazyLoadProvider.config({
        debug: true,
        events: true,
        modules: [{
            name: 'isotope',
            files: [
                'js/copya/plugins/imagesloaded/imagesloaded.pkgd.min.js',
                'js/copya/plugins/jquery-isotope/isotope.pkgd.min.js'
            ]
        }, {
            name: 'codropsDialogFx',
            files: [
                'js/copya/plugins/codrops-dialogFx/dialogFx.js',
                'js/copya/plugins/codrops-dialogFx/dialog.css',
                'js/copya/plugins/codrops-dialogFx/dialog-sandra.css'
            ]
        }, {
            name: 'metrojs',
            files: [
                'js/copya/plugins/jquery-metrojs/MetroJs.min.js',
                'js/copya/plugins/jquery-metrojs/MetroJs.css'
            ]
        }, {
            name: 'owlCarousel',
            files: [
                'js/copya/plugins/owl-carousel/owl.carousel.min.js',
                'js/copya/plugins/owl-carousel/assets/owl.carousel.css'
            ]
        }, {
            name: 'noUiSlider',
            files: [
                'js/copya/plugins/jquery-nouislider/jquery.nouislider.min.js',
                'js/copya/plugins/jquery-nouislider/jquery.liblink.js',
                'js/copya/plugins/jquery-nouislider/jquery.nouislider.css'
            ]
        }, {
            name: 'nvd3',
            files: [
                'js/copya/plugins/nvd3/lib/d3.v3.js',
                'js/copya/plugins/nvd3/nv.d3.min.js',
                'js/copya/plugins/nvd3/src/utils.js',
                'js/copya/plugins/nvd3/src/tooltip.js',
                'js/copya/plugins/nvd3/src/interactiveLayer.js',
                'js/copya/plugins/nvd3/src/models/axis.js',
                'js/copya/plugins/nvd3/src/models/line.js',
                'js/copya/plugins/nvd3/src/models/lineWithFocusChart.js',
                'js/copya/plugins/angular-nvd3/angular-nvd3.js',
                'js/copya/plugins/nvd3/nv.d3.min.css'
            ],
            serie: true // load in the exact order
        }, {
            name: 'rickshaw',
            files: [
                'js/copya/plugins/nvd3/lib/d3.v3.js',
                'js/copya/plugins/rickshaw/rickshaw.min.js',
                'js/copya/plugins/angular-rickshaw/rickshaw.js',
                'js/copya/plugins/rickshaw/rickshaw.min.css',
            ],
            serie: true
        }, {
            name: 'sparkline',
            files: [
                'js/copya/plugins/jquery-sparkline/jquery.sparkline.min.js',
                'js/copya/plugins/angular-sparkline/angular-sparkline.js'
            ]
        }, {
            name: 'mapplic',
            files: [
                'js/copya/plugins/mapplic/js/hammer.js',
                'js/copya/plugins/mapplic/js/jquery.mousewheel.js',
                'js/copya/plugins/mapplic/js/mapplic.js',
                'js/copya/plugins/mapplic/css/mapplic.css'
            ]
        }, {
            name: 'skycons',
            files: ['js/copya/plugins/skycons/skycons.js']
        }, {
            name: 'switchery',
            files: [
                'js/copya/plugins/switchery/js/switchery.min.js',
                'js/copya/plugins/ng-switchery/ng-switchery.js',
                'js/copya/plugins/switchery/css/switchery.min.css',
            ]
        }, {
            name: 'menuclipper',
            files: [
                'js/copya/plugins/jquery-menuclipper/jquery.menuclipper.css',
                'js/copya/plugins/jquery-menuclipper/jquery.menuclipper.js'
            ]
        }, {
            name: 'wysihtml5',
            files: [
                'js/copya/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css',
                'js/copya/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js'
            ]
        }, {
            name: 'stepsForm',
            files: [
                'js/copya/plugins/codrops-stepsform/css/component.css',
                'js/copya/plugins/codrops-stepsform/js/stepsForm.js'
            ]
        }, {
            name: 'jquery-ui',
            files: ['js/copya/plugins/jquery-ui-touch/jquery.ui.touch-punch.min.js']
        }, {
            name: 'moment',
            files: ['assets/plugins/moment/moment.min.js',
                'js/copya/plugins/moment/moment-with-locales.min.js'
            ]
        }, {
            name: 'moment-locales',
            files: ['js/copya/plugins/moment/moment-with-locales.min.js'
            ]
        }, {
            name: 'hammer',
            files: ['js/copya/plugins/hammer.min.js']
        }, {
            name: 'sieve',
            files: ['js/copya/plugins/jquery.sieve.min.js']
        }, {
            name: 'line-icons',
            files: ['js/copya/plugins/simple-line-icons/simple-line-icons.css']
        }, {
            name: 'ionRangeSlider',
            files: [
                'js/copya/plugins/ion-slider/css/ion.rangeSlider.css',
                'js/copya/plugins/ion-slider/css/ion.rangeSlider.skinFlat.css',
                'js/copya/plugins/ion-slider/js/ion.rangeSlider.min.js'
            ]
        }, {
            name: 'navTree',
            files: [
                'js/copya/plugins/angular-bootstrap-nav-tree/abn_tree_directive.js',
                'js/copya/plugins/angular-bootstrap-nav-tree/abn_tree.css'
            ]
        }, {
            name: 'nestable',
            files: [
                'js/copya/plugins/jquery-nestable/jquery.nestable.css',
                'js/copya/plugins/jquery-nestable/jquery.nestable.js',
                'js/copya/plugins/angular-nestable/angular-nestable.js'
            ]
        }, {
            //https://github.com/angular-ui/ui-select
            name: 'select',
            files: [
                'js/copya/plugins/bootstrap-select2/select2.css',
                'js/copya/plugins/angular-ui-select/select.min.css',
                'js/copya/plugins/angular-ui-select/select.min.js'
            ]
        }, {
            name: 'datepicker',
            files: [
                'js/copya/plugins/bootstrap-datepicker/css/datepicker3.css',
                'js/copya/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
            ]
        }, {
            name: 'daterangepicker',
            files: [
                'js/copya/plugins/moment/moment.min.js',
                'js/copya/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
                'js/copya/plugins/bootstrap-daterangepicker/daterangepicker.js',
                'js/copya/plugins/angular-daterangepicker/angular-daterangepicker.min.js'
            ],
            serie: true
        }, {
            name: 'timepicker',
            files: [
                'js/copya/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css',
                'js/copya/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'
            ]
        }, {
            name: 'inputMask',
            files: [
                'js/copya/plugins/jquery-inputmask/jquery.inputmask.min.js'
            ]
        }, {
            name: 'autonumeric',
            files: [
                'js/copya/plugins/jquery-autonumeric/autoNumeric.js'
            ]
        }, {
            name: 'summernote',
            files: [
                'js/copya/plugins/summernote/css/summernote.css',
                'js/copya/plugins/summernote/js/summernote.min.js',
                'js/copya/plugins/angular-summernote/angular-summernote.min.js'
            ],
            serie: true // load in the exact order
        }, {
            name: 'tagsInput',
            files: [
                'js/copya/plugins/bootstrap-tag/bootstrap-tagsinput.css',
                'js/copya/plugins/bootstrap-tag/bootstrap-tagsinput.min.js'
            ]
        }, {
            name: 'dropzone',
            files: [
                'js/copya/plugins/dropzone/css/dropzone.css',
                'js/copya/plugins/dropzone/dropzone.min.js',
                'js/copya/plugins/angular-dropzone/angular-dropzone.js'
            ],
            serie: true
        }, {
            name: 'wizard',
            files: [
                'js/copya/plugins/lodash/lodash.min.js',
                'js/copya/plugins/angular-wizard/angular-wizard.min.css',
                'js/copya/plugins/angular-wizard/angular-wizard.min.js'
            ]
        }, {
            name: 'dataTables',
            files: [
                'js/copya/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css',
                'js/copya/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css',
                'js/copya/plugins/datatables-responsive/css/datatables.responsive.css',
                'js/copya/plugins/jquery-datatable/media/js/jquery.dataTables.min.js',
                'js/copya/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
                'js/copya/plugins/jquery-datatable/media/js/dataTables.bootstrap.js',
                'js/copya/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js',
                'js/copya/plugins/datatables-responsive/js/datatables.responsive.js',
                'js/copya/plugins/datatables-responsive/js/lodash.min.js'
            ],
            serie: true // load in the exact order
        }, {
            name: 'google-map',
            files: [
                'js/copya/plugins/angular-google-map-loader/google-map-loader.js',
                'js/copya/plugins/angular-google-map-loader/google-maps.js'
            ]
        },  {
            name: 'interact',
            files: [
                'js/copya/plugins/interactjs/interact.min.js'
            ]
        }, {
            name: 'tabcollapse',
            files: [
                'js/copya/plugins/bootstrap-collapse/bootstrap-tabcollapse.js'
            ]
        },  {
            name: 'ui-grid',
            files: [
                'js/copya/plugins/angular-ui-grid/ui-grid.min.css',
                'js/copya/plugins/angular-ui-grid/ui-grid.min.js']

        },{
            name: 'typehead',
            files: [
                'js/copya/plugins/bootstrap-typehead/typeahead.bundle.min.js',
                'js/copya/plugins/bootstrap-typehead/typeahead.jquery.min.js',
                'js/copya/plugins/bootstrap-typehead/bloodhound.min.js',
                'js/copya/plugins/angular-typehead/angular-typeahead.min.js'
            ]
        }, {
            name: 'ngdropzone',
            files: [
                'js/copya/plugins/ngdropzone/dropzone.css',
                'js/copya/plugins/ngdropzone/dropzone.js',
                'js/copya/plugins/ngdropzone/ng-dropzone.css',
                'js/copya/plugins/ngdropzone/ng-dropzone.js',
                //'js/copya/plugins/angular-dropzone/angular-dropzone.js'
            ],
            serie: true
        }

        ]
    });
}

load.$inject = ['$ocLazyLoadProvider'];


angular.module('copya')
    .config(load);