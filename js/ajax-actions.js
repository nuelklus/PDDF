$(function(){
  // debugger;
  // get post data from DB
  $.ajax({
    url: 'includes/getpost.php',
    type: 'get',
    dataType: 'json',
    success: function(response){
        var len = response.length;
        console.log(len);
        for(var i=0; i<len; i++){
            var id = response[i].id;
            // var username = response[i].id;
            // var name = response[i].name;
            // var email = response[i].email;
            console.log(id);
        }  
    },

    error: function (xhr, ajaxOptions, thrownError) {
      // debugger;
      var err = "Error: " + " " + xhr.responseText;
      if (xhr.responseText && xhr.responseText[0] == "{")
          err = JSON.parse(xhr.responseText).Message;
      alert(err);
  }
});

  // post new post data to DB
  $('#submitpost').click(function(e){
    e.preventDefault();
    debugger;
      var post_id = 'NULL';
      var title = $("#title").val();
      var sector = $("#sector").val();
      var level = $("#level").val();
      var desc = $("#desc").val();
      var requirement = $("#requirement").val();
      var salary = $("#salary").val();
      var expiredate = $("#expiredate").val();
      var employment_type = $("#employment_type").val();
      var loc = 'Adenta';
      var employment_id = 1;
      var createdate = '2020-06-06';
      // console.log('test');
      $.ajax({
        url:'includes/savepost.php',
        method:'POST',
        // type: 'post',
        dataType: 'json',
        data: { post_id:post_id,
            title:title,
            sector:sector,
            level:level,
            desc:desc,
            requirement:requirement,
            salary:salary,
            expiredate:expiredate,
            employment_type:employment_type,
            loc:loc,
            employment_id:employment_id,
            createdate:createdate
          },
    success: function (data) {
      // debugger;
        if (data) {
            debugger;
            //sessionStorage.setItem('token', response.access_token);

            // alert("Success! Ad has been posted.");

            // window.location.href = "my-account.html?ads=";
        }
    },
    error: function (xhr, ajaxOptions, thrownError) {
      // debugger;
        var err = "Error: " + " " + xhr.responseText;
        if (xhr.responseText && xhr.responseText[0] == "{")
            err = JSON.parse(xhr.responseText).Message;
        alert(err);
    }
  });
});
// end save post
// --------------------------------------------

// get employer from DB
// debugger;
$.ajax({
  url: 'includes/getemployer.php',
  type: 'get',
  dataType: 'json',
  success: function(response){
      var len = response.length;
      console.log(len);
      for(var i=0; i<len; i++){
          var name = response[i].name;
          console.log(name);
      }  
  },

  error: function (xhr, ajaxOptions, thrownError) {
    // debugger;
    var err = "Error: " + " " + xhr.responseText;
    if (xhr.responseText && xhr.responseText[0] == "{")
        err = JSON.parse(xhr.responseText).Message;
    alert(err);
}
}); 

// post new employer data to DB
$('#submitemployer').click(function(e){
  e.preventDefault();
  debugger;
    var employer_id = 2;
    var name = $("#name").val();
    var email = $("#email").val();
    var sector = $("#sector").val();
    var website = $("#website").val();
    var desc = $("#desc").val();
    var address = 'Adenta';
    
    debugger;
    $.ajax({
      url:'includes/postemployer.php',
      method:'POST',
      dataType: 'json',
      data: { 
          employer_id:employer_id,
          name:name,
          email:email,
          sector:sector,
          website:website,
          desc:desc,
          address:address
        },
  success: function (data) {
      // debugger;
      if (data) {
          // debugger;
          //sessionStorage.setItem('token', response.access_token);

          // alert("Success! Ad has been posted.");

          // window.location.href = "my-account.html?ads=";
      }
  },
  error: function (xhr, ajaxOptions, thrownError) {
    // debugger;
      var err = "Error: " + " " + xhr.responseText;
      if (xhr.responseText && xhr.responseText[0] == "{")
          err = JSON.parse(xhr.responseText).Message;
      alert(err);
  }
});
});
// end post employer
// --------------------------------------------

// get candidate from DB
// debugger;
$.ajax({
  url: 'includes/getcandidate.php',
  type: 'get',
  dataType: 'json',
  success: function(response){
      var len = response.length;
      console.log(len);
      for(var i=0; i<len; i++){
          var profession = response[i].profession;
          console.log(profession);
      }  
  },

  error: function (xhr, ajaxOptions, thrownError) {
    // debugger;
    var err = "Error: " + " " + xhr.responseText;
    if (xhr.responseText && xhr.responseText[0] == "{")
        err = JSON.parse(xhr.responseText).Message;
    alert(err);
}
}); 

// post new candidate data to DB
$('#submitcandidate').click(function(e){
  e.preventDefault();
  debugger;
    var candidate_id = 'NULL';
    var profession = $("#profession").val();
    var loc = $("#loc").val();
    var expected_salary = $("#expected_salary").val();
    
    debugger;
    $.ajax({
      url:'includes/postcandidate.php',
      method:'POST',
      dataType: 'json',
      data: { 
          candidate_id:candidate_id,
          profession:profession,
          loc:loc,
          expected_salary:expected_salary
        },
  success: function (data) {
      debugger;
      if (data) {
          // debugger;
          //sessionStorage.setItem('token', response.access_token);

          // alert("Success! Ad has been posted.");

          // window.location.href = "my-account.html?ads=";
      }
  },
  error: function (xhr, ajaxOptions, thrownError) {
    debugger;
      var err = "Error: " + " " + xhr.responseText;
      if (xhr.responseText && xhr.responseText[0] == "{")
          err = JSON.parse(xhr.responseText).Message;
      alert(err);
  }
});
});
// end post candidate
// --------------------------------------------
});