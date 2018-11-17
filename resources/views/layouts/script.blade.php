 <!-- ===== Script for Global ===== -->
    <!-- Scripts -->
    <script type="text/javascript" src="/assets/js/jquery-3.2.1.min.js"></script>-->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> -->
    <!-- <script src="//code.jquery.com/jquery-1.12.0.min.js"></script> -->
    
    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>   
    <!-- Datatable plugin with language configuration -->
    <script type="text/javascript" src="/assets/js/jquery.dataTables.min.js"></script>
    @switch(app()->getLocale())
        @case('en')
            <script type="text/javascript">
            $.extend(true, $.fn.dataTable.defaults, {"language": { "url": "/localisation/English.json" }});
            </script>
            @break
        @case('fr')
            <script type="text/javascript">
            $.extend(true, $.fn.dataTable.defaults, {"language": { "url": "/localisation/French.json" }});
            </script>
            @break
        @case('es')
            <script type="text/javascript">
            $.extend(true, $.fn.dataTable.defaults, {"language": { "url": "/localisation/Spanish.json" }});
            </script>
            @break
    @endswitch
    <script type="text/javascript" src="/assets/js/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="/assets/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="/assets/js/select2.min.js"></script>
    <script type="text/javascript" src="/assets/js/moment.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/morris/morris.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/raphael/raphael-min.js"></script>
    <script type="text/javascript" src="/assets/js/app.js"></script>

    <!-- <script src="{{ asset('/js/app.js') }}"></script> -->
<!-- ===== Script for Global-End ===== -->