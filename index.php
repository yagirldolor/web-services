<html>
<head>
<title>Air Jordan Web Service Demo</title>
<style>
	body {font-family:georgia;}
  
   .shoe{
    border:1px solid black;
    border-radius: 5px;
    padding: 5px;
    margin-bottom:5px;
    position:relative;   
  }
  .pic{
    position:absolute;
    right:10px;
    top:10px;
  }
  
  .pic img{
	max-width:100px;
  }

</style>
<script src="https://code.jquery.com/jquery-latest.js"></script>

<script type="text/javascript">

  function bondTemplate(shoe){

    return `
    <div class="shoe">
            <b>Number</b>: ${shoe.Number}<br /> 
            <b>Name</b>: ${shoe.Name}<br /> 
            <b>Year</b>: ${shoe.Year}<br /> 
            <b>Cut</b>: ${shoe.Cut}<br /> 
            <b id="des">Description</b>: ${shoe.Description}<br /> 
            <div class="pic"><img src="images/${shoe.Image}" /></div>
      </div>
    `;
    
  }
  
$(document).ready(function() { 

 $('.category').click(function(e){
   e.preventDefault(); //stop default action of the link
   cat = $(this).attr("href");  //get category from URL
  
   var request = $.ajax({
     url: "api.php?cat=" + cat,
     method: "GET",
     dataType: "json"
   });
   request.done(function( data ) {
    console.log(data);

     // place data.title on page 

     $("#shoetitle").html(data.title);

     // clear previous data
     $("#shoes").html("");

     // loop thru data.films and place on page
     $.each(data.shoes,function(i,item){

      let myData = bondTemplate(item);
       $("<div></div>").html(myData).appendTo("#shoes");
       
     });

     // let myData = JSON.stringify(data,null,4);
     // myData = "<pre>" + myData + "</pre>";
     // $("#output").html(myData);

   });
   request.fail(function(xhr, status, error ) {
alert('Error - ' + xhr.status + ': ' + xhr.statusText);
   });

  });
}); 



</script>
</head>
	<body>
	<h1>First 10 Nike Air Jordan Shoes</h1>
    <p>This webpage uses jQuery and AJAX to create a dynamic webpage that changes the display on the screen after a click action.</p>
		<a href="year" class="category">By Year</a><br />
		<a href="num" class="category">By Name</a>
		<h3 id="shoetitle"></h3>
		<div id="shoes">
      <!--
			<div class="film">
        
            <b>Film</b>: 1<br /> 
            <b>Title</b>: Dr. No<br /> 
            <b>Year</b>: 1962<br /> 
            <b>Director</b>: Terence Young<br /> 
            <b>Producers</b>: Harry Saltzman and Albert R. Broccoli<br /> 
            <b>Writers</b>: Richard Maibaum, Johanna Harwood and Berkely Mather<br /> 
            <b>Composer</b>: Monty Norman<br /> 
            <b>Bond</b>: Sean Connery<br /> 
            <b>Budget</b>: $1,000,000.00<br /> 
            <b>BoxOffice</b>: $59,567,035.00<br /> 
            <div class="pic"><img src="thumbnails/dr-no.jpg" /></div>
      </div>
        -->
		</div>
		<div id="output"></div>
	</body>
</html>