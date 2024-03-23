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

    .error-message {
        color: red;
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
    @if ($errors->any())
        <div class="error-message">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <input type="hidden" name="form_counter" value="{{ old('form_counter', 1) }}">

    <div class="form-group">
        <label>Nama</label>
        <input class="form-control" type="text" placeholder="Nama..." name="name[]" value="{{ old('name.0') }}"
            required>
    </div>
    <div class="form-group">
        <label>NIM</label>
        <input class="form-control" type="number" placeholder="NIM..." name="nim[]" value="{{ old('nim.0') }}"
            required>
    </div>
    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-control" id="jenis_kelamin" name="gender[]" required>
            <option value="laki-laki" @if (old('gender.0') == 'laki-laki') selected @endif>Laki-laki</option>
            <option value="perempuan" @if (old('gender.0') == 'perempuan') selected @endif>Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label>Jurusan</label>
        <input class="form-control" type="text" placeholder="Jurusan..." name="major[]" value="{{ old('major.0') }}"
            required>
    </div>
    <div class="form-group">
        <label>No Hanphone</label>
        <input class="form-control" type="number" placeholder="No hp..." name="phone[]" value="{{ old('phone.0') }}"
            required>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input class="form-control" type="text" placeholder="Alamat..." name="address[]"
            value="{{ old('address.0') }}" required>
    </div>

</form>


<div id="formTemplate" style="display: none;">


    <div class="form-group">
        <label>Nama</label>
        <input class="form-control" type="text" placeholder="Nama..." name="name[]" value="{{ old('name.*') }}"
            required>
    </div>
    <div class="form-group">
        <label>NIM</label>
        <input class="form-control" type="number" placeholder="NIM..." name="nim[]" value="{{ old('nim.*') }}"
            required>
    </div>
    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-control" id="jenis_kelamin" name="gender[]" required>
            <option value="laki-laki" {{ old('gender.*') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="perempuan" {{ old('gender.*') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label>Jurusan</label>
        <input class="form-control" type="text" placeholder="Jurusan..." name="major[]" value="{{ old('major.*') }}"
            required>
    </div>

    <div class="form-group">
        <label>No Hanphone</label>
        <input class="form-control" type="number" placeholder="No hp..." name="phone[]" value="{{ old('phone.*') }}"
            required>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input class="form-control" type="text" placeholder="Alamat..." name="address[]"
            value="{{ old('address.*') }}" required>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Counter to track the number of added forms
        let formCounter = parseInt("{{ old('form_counter', 1) }}");

        function updateFormCounter() {
            formCounter = $('.clone-form').length + 1;
            console.log(formCounter);
        }
        // Add Form button click event
        function addClonedForm() {
            // Clone the form template
            const clonedForm = $('#formTemplate').clone().removeAttr('id').addClass('clone-form');

            // Update the names of the cloned form fields
            clonedForm.find('[name]').each(function() {
                const originalName = $(this).attr('name');
                const newName = originalName.replace(/\[\d+\]/, '[' + formCounter + ']');
                $(this).attr('name', newName);

            })

            // Append the cloned form to the dynamicForm
            $('#dynamicForm').append(clonedForm);

            // Show the cloned form
            clonedForm.show();

            // Increment the formCounter value
            formCounter++;

            // Show Kurang Form button when there is more than one form
            if (formCounter > 1) {
                $('#removeForm').show();
            }
            updateFormCounter();
        }
        $('#addForm').on('click', function() {
            addClonedForm();

            // Simpan nilai form_counter ke dalam input hidden
            $('input[name="form_counter"]').val(formCounter);
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
            $('input[name="form_counter"]').val(formCounter);
        });
        for (let i = 1; i < formCounter; i++) {
            addClonedForm();
        }
    });
</script>
