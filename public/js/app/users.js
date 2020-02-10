$.ajax({
  url: 'https://randomuser.me/api/?inc=login,name,nat=fr',
  dataType: 'json',
  success: function(data) {
    console.log(data);
  }
});