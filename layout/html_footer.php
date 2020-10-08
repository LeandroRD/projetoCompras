




        

        


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- <script src="assets/js/jquery.min.js"></script> -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

<!-- link DataTable -->
<script
    type="text/javascript" src="assets/inc/datatables.min.js"> 
</script>
        
<!-- Variavel tabela vale como datatable -->

<script>  
            $(document).ready( function () {
                // Campo para inserir o nome da datatable
                $('#tabela').DataTable({
                    "ordering":   true,
                    "language": {
                            "lengthMenu": "Apresentar _MENU_ linhas por página.",
                            "zeroRecords": "Não há registro",
                            "info": "Mostrando a pagina  _PAGE_ de _PAGES_",
                            "infoEmpty": "Não há registro",
                            "infoFiltered": "(filtrando de _MAX_ registros)",

                            "search":         "Busca:",
                            
                            "paginate": {
                                "first":      "Primeiro",
                                "last":       "Último",
                                "next":       "Próximo",
                                "previous":   "Anterior"        
                            }
                    }               
                });
            } );
        </script>
        

</body>
</html>