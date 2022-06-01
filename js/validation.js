// category validation
$('#enquiry').validate({
    rules: {
        name: 'required',
        email: 'required',
        contact: {
        required:true,
        minlength:10,
        maxlength:10,
    },
        msg: 'required',
    },
    messages: {},
    submitHandler: function (form) {
      alert('validated form')
      $.ajax({
        url: 'action.php',
        type: 'post',
        data: new FormData(form),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          alert(data)
          console.log(data)
        },
      })
    },
  })