<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<title>Backbone</title>
	</head>
	<body>
		<div class="container">
			<h1>Backbone App</h1>
			<table class="table">
			  	<thead>
			    	<tr>
			    		<th scope="col">Author</th>
			      		<th scope="col">Title</th>
						<th scope="col">URL</th>
						<th scope="col">Action</th>
			    	</tr>
			  	</thead>
			  	<tbody> 
			  		<tr id="blog-list"></tr>
			  	</tbody>
			</table>
		</div>

		<script type="text/template" id="blog-list-template">
			<td><span class="author"><%= author %></span></td>
			<td><span class="title"><%= title %></span></td>
			<td><span class="url"><%= url %></span></td>
			<td>
				<button class="btn btn-warning edit-button">Edit</button>
				<button class="btn btn-danger delete-button">Delete</button>
			</td>
		</script>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.3.3/backbone-min.js"></script>
		<script>
			
			/* Backbone Model */
			var Blog = Backbone.Model.extend({
				defaults : {
					author: '',
					title: '',
					URL: ''
				}
			})

			/* Backbone Collection (an array of models) */
			var Blogs = Backbone.Collection.extend({})

			// instantiate new blogs
			var afd = new Blog({author: 'Anne Frank', title: 'My Diary', URL:'Auschwitz.com'})
			var mk = new Blog({author: 'Adolf Hitler', title: 'Mein Kampf', URL: '4threich.de'})

			// instantiate the collection
			var books = new Blogs([afd, mk])

			/* DOM elems */
			// blog list template
			var blogListItem = document.getElementById('blog-list-template').innerHTML

			// blog list container
			var blogList = document.getElementById('blog-list')

			/* views */
			// for 1 book
			var singleBookView = Backbone.View.extend({
				model: new Blog(),
				tagName: 'tr',
				initialize: function(){
					this.template = _.template(blogListItem);
				},
				render: function(){
					this.$el.html(
						this.tempalte(
							this.model.toJSON()
						)
					)
				}
			})

			// for all books
			var allBooksView = Backbone.View.extend({
				model: books,
				el: blogList,
				initialize: function(){
					this.model.on('add', this.render(), this)
				},
				render: function(){
					this.$el.html('')
					_.each(this.model.toArray())
				}
			})

		</script>
	</body>
</html>