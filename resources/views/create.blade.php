@include('partials.header')
<style>
    .clone-form {
        border-top: 5px solid #ccc;
        /* Adjust color and thickness as needed */
        margin-top: 10px;
        /* Optional margin for spacing between forms */
        padding-top: 10px;
        /* Optional padding for spacing between forms */
    }
</style>

<form action="{{ route('student.store') }}" method="post" style="margin:50px" id="dynamicForm">
    @csrf
    <div class="container" style="margin:0;padding:0">
        <button type="button" class="btn btn-success" id="addForm">
            Tambah Form
        </button>
        <button type="button" class="btn btn-danger" id="removeForm" style="display:none;">Hapus Form</button>
        <button type="submit" class="btn btn-secondary">
            Simpan
        </button>
    </div>
    <hr>
    <div class="form-group">
        <label>Nama</label>
        <input class="form-control" type="text" placeholder="Nama..." name="name[]">
    </div>
    <div class="form-group">
        <label>NIM</label>
        <input class="form-control" type="number" placeholder="NIM..." name="nim[]">
    </div>
    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-control" id="jenis_kelamin" name="gender[]">
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label>Jurusan</label>
        <input class="form-control" type="text" placeholder="Jurusan..." name="major[]">
    </div>

    <div class="form-group">
        <label>No Hanphone</label>
        <input class="form-control" type="number" placeholder="No hp..." name="phone[]">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input class="form-control" type="text" placeholder="Alamat..." name="address[]">
    </div>

</form>


<div id="formTemplate" style="display: none;">
    <div class="form-group">
        <label>Nama</label>
        <input class="form-control" type="text" placeholder="Nama..." name="name[]">
    </div>
    <div class="form-group">
        <label>NIM</label>
        <input class="form-control" type="number" placeholder="NIM..." name="nim[]">
    </div>
    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-control" id="jenis_kelamin" name="gender[]">
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label>Jurusan</label>
        <input class="form-control" type="text" placeholder="Jurusan..." name="major[]">
    </div>

    <div class="form-group">
        <label>No Hanphone</label>
        <input class="form-control" type="number" placeholder="No hp..." name="phone[]">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input class="form-control" type="text" placeholder="Alamat..." name="address[]">
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Counter to track the number of added forms
        let formCounter = 1;

        // Add Form button click event
        $('#addForm').on('click', function() {
            // Clone the form template
            const clonedForm = $('#formTemplate').clone().removeAttr('id').addClass('clone-form');

            // Update the names of the cloned form fields
            clonedForm.find('[name]').each(function() {
                const originalName = $(this).attr('name');
                const newName = originalName.replace(/\[\d+\]/, '[' + formCounter + ']');
                $(this).attr('name', newName);
            });

            // Append the cloned form to the dynamicForm
            $('#dynamicForm').append(clonedForm);

            // Show the cloned form
            clonedForm.show();

            // Increment the form counter
            formCounter++;

            // Show Kurang Form button when there is more than one form
            if (formCounter > 1) {
                $('#removeForm').show();
            }
        });

        // Kurang Form button click event
        $('#removeForm').on('click', function() {
            // Remove the last added form
            $('#dynamicForm .clone-form:last').remove();

            // Decrement the form counter
            formCounter--;

            // Hide Kurang Form button when there is only one form
            if (formCounter === 1) {
                $('#removeForm').hide();
            }
        });
    });
</script>
