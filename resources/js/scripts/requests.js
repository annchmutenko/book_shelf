require('axios')
$(".request-delete").click(function(e) {
    e.preventDefault();
    let confirm = prompt('Input \'DELETE\'');
    if(confirm === 'DELETE') {
        let url = $(this).attr('href');
        let token = $('[name="token"]').attr('content');

        let form = document.createElement('form');
        form.action = url;
        form.method = 'POST';
        form.innerHTML = '<input type="hidden" name="_method" value="delete"/><input type="hidden" name="_token" value=' + token + '>';

        document.body.append(form);
        form.submit();
    }
})
