<!doctype html>
<html lang="en">

<head>
    @include('components.backend.head')
</head>

    @include('components.backend.header')
    <!--start sidebar wrapper-->
    @include('components.backend.sidebar')
    <!--end sidebar wrapper-->
    <div class="page-body">
      <div class="container-fluid">
        <div class="page-title">
          <div class="row">
            <div class="col-6">
              <h4>Edit Privacy Policy Form</h4>
            </div>
            <div class="col-6">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.manage-privacy-policy.index') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Edit Privacy Policy</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid starts-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Privacy Policy Form</h4>
                <p class="f-m-light mt-1">Update the details and save the form.</p>
              </div>
              <div class="card-body">

                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                <form class="row g-3 needs-validation custom-input" novalidate
                      action="{{ route('admin.manage-privacy-policy.update', $policy->id) }}"
                      method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <!-- 1. Privacy Policy -->
                  <div class="col-12">
                    <div class="form-group">
                      <label>Privacy Policy <span class="text-danger">*</span></label>
                      <textarea name="privacy_policy" class="form-control editor" rows="5">{{ old('privacy_policy', $policy->privacy_policy) }}</textarea>
                    </div>
                  </div>

                  <!-- 2. Questions & Answers table -->
                  <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <label class="mb-0">Questions &amp; Answers</label>
                      <button type="button" id="addQaRow" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i> Add Question
                      </button>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-bordered align-middle" id="qaTable">
                        <thead>
                          <tr>
                            <th style="width:40px;">#</th>
                            <th style="width:30%;">Question</th>
                            <th>Answer</th>
                            <th style="width:70px;">Action</th>
                          </tr>
                        </thead>
                        <tbody id="qaBody">
                          <!-- rows injected by JS -->
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <!-- 3. Contact Details -->
                  <div class="col-12">
                    <div class="form-group">
                      <label>Contact Details</label>
                      <textarea name="contact_details" class="form-control editor" rows="5">{{ old('contact_details', $policy->contact_details) }}</textarea>
                    </div>
                  </div>

                  <!-- Form Actions -->
                  <div class="col-12 text-end">
                    <a href="{{ route('admin.manage-privacy-policy.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button class="btn btn-primary" type="submit">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer start-->
    @include('components.backend.footer')

    @include('components.backend.main-js')

<!-- CKEditor 5 (skip this line if it's already loaded in main-js) -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
  const seedRows = @json(old('questions', $policy->questions ?? []));
</script>
<script>
  (function () {
    let qaIndex = 0;
    const editors = {};

    const editorConfig = {
      heading: {
        options: [
          { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
          { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
          { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
          { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
          { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
          { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
          { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
        ]
      }
    };

    function initEditor(el) {
      ClassicEditor.create(el, editorConfig)
        .then(editor => { editors[el.dataset.editorKey] = editor; })
        .catch(err => console.error(err));
    }

    // init the static Privacy Policy + Contact Details editors
    document.querySelectorAll('textarea.editor').forEach((el, i) => {
      el.dataset.editorKey = 'static_' + i;
      initEditor(el);
    });

    const qaBody = document.getElementById('qaBody');

    function renumber() {
      qaBody.querySelectorAll('tr').forEach((tr, idx) => {
        tr.querySelector('.row-num').textContent = idx + 1;
      });
    }

    function escapeHtml(str) {
      return String(str ?? '')
        .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;').replace(/'/g, '&#039;');
    }

    function addQaRow(question, answer) {
      question = question || '';
      answer = answer || '';
      const i = qaIndex++;
      const key = 'answer_' + i;
      const tr = document.createElement('tr');
      tr.innerHTML =
        '<td class="row-num text-center"></td>' +
        '<td><input type="text" name="questions[' + i + '][question]" class="form-control" value="' + escapeHtml(question) + '" placeholder="Enter question" required></td>' +
        '<td><textarea id="' + key + '" data-editor-key="' + key + '" name="questions[' + i + '][answer]" class="form-control" rows="3">' + escapeHtml(answer) + '</textarea></td>' +
        '<td class="text-center"><button type="button" class="btn btn-sm btn-danger remove-row">&times;</button></td>';
      qaBody.appendChild(tr);
      initEditor(tr.querySelector('textarea'));
      renumber();
    }

    document.getElementById('addQaRow').addEventListener('click', function () {
      addQaRow();
    });

    qaBody.addEventListener('click', function (e) {
      if (e.target.classList.contains('remove-row')) {
        const tr = e.target.closest('tr');
        const ta = tr.querySelector('textarea');
        if (ta && editors[ta.dataset.editorKey]) {
          editors[ta.dataset.editorKey].destroy();
          delete editors[ta.dataset.editorKey];
        }
        tr.remove();
        renumber();
      }
    });

    // seed existing questions, else start with one empty row
    if (Array.isArray(seedRows) && seedRows.length) {
      seedRows.forEach(function (r) {
        addQaRow(r.question, r.answer);
      });
    } else {
      addQaRow();
    }
  })();
</script>
</body>
</html>