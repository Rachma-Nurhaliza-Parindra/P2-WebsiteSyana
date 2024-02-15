<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= isset($meta['title']) ? $meta['title'] : 'SYANDANA NAWASENA' ?></title>

<style>
	/* html {
		height: 100%;
	}
	*/
	body {
		margin: 0;
		padding: 0;
		display: flex;
		flex-direction: column;
	}

	.navbar {
		display: flex;
		gap: 1em;
		background-color: teal;
	}

	.navbar a {
		font-family: sans-serif;
		font-weight: 500;
		color: white;
		text-decoration: none;
		padding: 1rem;
	}

	.navbar a:hover {
		background-color: rgba(255, 255, 255, 0.1);
	}

	.footer {
		background-color: #333;
		color: #000;
		text-align: center;
		padding: 20px;

		font-family: sans-serif;
		background-color: whitesmoke;
		/* padding: 1em;
		text-align: center;
		border-top: 1px solid lightgray; */
	}

	/* Form */
	form {
		box-sizing: border-box;
		display: flex;
		flex-direction: column;
		gap: 1rem;
		margin: 2em 0;
		max-width: 400px;
		/* Menambahkan batas lebar maksimum form */
		margin: 0 auto;
		/* Untuk menengahkan form */
	}

	label {
		display: block;
		/* Mengubah label menjadi block agar terpisah dari elemen lain */
		margin-bottom: 0.5rem;
		font-weight: bold;
		/* Menambahkan ketebalan pada label */
	}

	input,
	textarea {
		display: block;
		/* Mengubah input dan textarea menjadi block */
		padding: 0.5rem;
		width: 100%;
		box-sizing: border-box;
		/* Menambahkan box-sizing untuk padding yang tepat */
		border-radius: 4px;
		/* Memberikan sedikit sudut lengkung pada input */
		border: 1px solid #ccc;
		/* Menambahkan border agar terlihat lebih jelas */
	}

	input:focus,
	textarea:focus {
		outline: none;
		/* Menghapus outline saat elemen dalam fokus */
		border-color: dodgerblue;
	}

	.invalid {
		border: 2px solid rgb(153, 16, 16);
	}

	.invalid::placeholder {
		color: rgb(153, 16, 16);
	}

	.invalid-feedback:empty {
		display: none;
	}

	.invalid-feedback {
		font-size: smaller;
		color: rgb(153, 16, 16);
	}

	/* Button */
	.button {
		background-color: #e7e7e7;
		border: 2px solid transparent;
		border-radius: 8px;
		color: black;
		padding: 8px 16px;
		/* Mengurangi padding horizontal agar tombol tidak terlalu lebar */
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 1rem;
		font-family: sans-serif;
		cursor: pointer;
		/* Menambahkan efek kursor pointer pada tombol */
		transition: background-color 0.3s ease;
		/* Animasi transisi saat hover */
	}

	.button:hover {
		background-color: #ccc;
		/* Mengubah warna latar saat tombol dihover */
	}

	.button:active {
		border: 2px solid rgba(0, 0, 0, 0.5);
	}

	.button-success {
		background-color: #4caf50;
		color: white;
	}

	.button-primary {
		background-color: #008cba;
		color: white;
	}

	.button-danger {
		background-color: #f44336;
		color: white;
	}

	.button-small {
		font-size: 0.7rem;
	}

	/* Form */
	form {
		box-sizing: border-box;
		display: flex;
		flex-direction: column;
		gap: 1rem;
		margin: 2em 0;
		max-width: 400px;
		/* Menambahkan batas lebar maksimum form */
		margin: 0 auto;
		/* Untuk menengahkan form */
	}

	label {
		display: block;
		/* Mengubah label menjadi block agar terpisah dari elemen lain */
		margin-bottom: 0.5rem;
		font-weight: bold;
		/* Menambahkan ketebalan pada label */
	}

	input,
	textarea {
		display: block;
		/* Mengubah input dan textarea menjadi block */
		padding: 0.5rem;
		width: 100%;
		box-sizing: border-box;
		/* Menambahkan box-sizing untuk padding yang tepat */
		border-radius: 4px;
		/* Memberikan sedikit sudut lengkung pada input */
		border: 1px solid #ccc;
		/* Menambahkan border agar terlihat lebih jelas */
	}

	input:focus,
	textarea:focus {
		outline: none;
		/* Menghapus outline saat elemen dalam fokus */
		border-color: dodgerblue;
	}

	.invalid {
		border: 2px solid rgb(153, 16, 16);
	}

	.invalid::placeholder {
		color: rgb(153, 16, 16);
	}

	.invalid-feedback:empty {
		display: none;
	}

	.invalid-feedback {
		font-size: smaller;
		color: rgb(153, 16, 16);
	}

	/* Button */
	.button {
		background-color: #e7e7e7;
		border: 2px solid transparent;
		border-radius: 8px;
		color: black;
		padding: 8px 16px;
		/* Mengurangi padding horizontal agar tombol tidak terlalu lebar */
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 1rem;
		font-family: sans-serif;
		cursor: pointer;
		/* Menambahkan efek kursor pointer pada tombol */
		transition: background-color 0.3s ease;
		/* Animasi transisi saat hover */
	}

	.button:hover {
		background-color: #ccc;
		/* Mengubah warna latar saat tombol dihover */
	}

	.button:active {
		border: 2px solid rgba(0, 0, 0, 0.5);
	}

	.button-success {
		background-color: #4caf50;
		color: white;
	}

	.button-primary {
		background-color: #008cba;
		color: white;
	}

	.button-danger {
		background-color: #f44336;
		color: white;
	}

	.button-small {
		font-size: 0.7rem;
	}
</style>