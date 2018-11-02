<template>

	<div class="fixed-table-body">
		
		<table :class="_table_class" ref="table">
			<thead :class="_thead_class">
				<slot name="thead"></slot>
			</thead>
			<tbody>
				<slot name="tbody"></slot>
			</tbody>
		</table>

	</div>

</template>
	<style type="text/css">
		table.dataTable
		{
			margin-top: 0px!important;
		}
	</style>
<script>
	export default{
		props:["_sort","_searching","_perPage","_changePerPage","_orderCol","_orderType","_table_class","_thead_class","_paging","_info"],
		mounted()
		{
			$(this.$refs.table).DataTable({

				"bSort": ((this._sort) ? this._sort : true),
				"searching": ((this._searching) ? this._searching : false),
				"pageLength": ((this._perPage) ? this._perPage : 10),
				"lengthChange": ((this._changePerPage) ? true : false),
				"paging":  ((this._paging) ? true : false),
				"info":  ((this._info) ? true : false),
				responsive: true,
				destroy: true,
				columnDefs: [
                	{ targets: 'no-sort', orderable: false }
                ],
				"order": [ ((this._orderCol) ? this._orderCol : 0), ((this._orderType) ? this._orderType : "desc")],
				"oLanguage": {
					"sEmptyTable": "Nenhum registro encontrado",
					"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
					"sInfoFiltered": "(Filtrados de _MAX_ registros)",
					"sInfoPostFix": "",
					"sInfoThousands": ".",
					"sLengthMenu": "_MENU_ Resultados",
					"sLoadingRecords": "Carregando...",
					"sProcessing": "Processando...",
					"sZeroRecords": "Nenhum registro encontrado",
					"sSearch": "Filtro",
					"oPaginate": {
						"sNext": "Próximo",
						"sPrevious": "Anterior",
						"sFirst": "Primeiro",
						"sLast": "Último"
					},
					"oAria": {
						"sSortAscending": ": Ordenar colunas de forma ascendente",
						"sSortDescending": ": Ordenar colunas de forma descendente"
					}
				}
			}, {
				"ordering": true
			});
		}
	}
</script>
