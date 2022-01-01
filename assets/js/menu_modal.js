$(function () {
	var myEditor
	ClassicEditor
		.create(document.querySelector('#arti'))
		.then(editor => {
			console.log(editor);
			myEditor = editor;
		})
		.catch(error => {
			console.error(error);
		});

	$('.tombolTambahData').on('click', function () {

		$('#formModalLabel').html('Tambah Kata');
		$('.modal-footer button[type=submit]').html('Tambah Data');

		$('#words').val(null);
		$('#arti').val(null);

	});

	$('.tampilModalUbah').on('click', function () {

		$('#formModalLabel').html('Ubah Kata');
		$('.modal-footer button[type=submit]').html('Ubah Data');
		$('.modal-body form').attr('action', base_url + 'menu/ubahData');

		const id_vocab = $(this).data('id');
		// console.log(id_vocab);

		$.ajax({
			url: base_url + 'menu/detail_ubah',
			data: {
				id_vocab: id_vocab
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_vocab').val(data.id_vocab);
				$('#words').val(data.words);
				// $('#arti').val(data.arti_bahasa);
				$('textarea#arti').html(myEditor.setData(data.arti_bahasa));

			}
		});

	});
});
