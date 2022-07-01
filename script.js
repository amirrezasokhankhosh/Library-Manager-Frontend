axios.get('http://localhost:8000/books/').then(resp => {
    let books = resp.data
    var str = '<tr class="header"><th class="title_col">Name</th><th class="author_col">Authors</th><th class="category_col">Categories</th><th class="publication_col">Publication</th><th class="availablity_col">Availability</th></tr>'
    for (let i = 0 ; i < books.length ; i++) {
        let name = books[i].name
        let authors = books[i].authors.toString()
        let publications = books[i].publications.toString()
        let categories = books[i].categories.toString()
        let availability = books[i].availability

        str += '<tr><td>'+ name + "</td><td>" + authors + "</td><td>" + categories + "</td><td>" + publications + "</td><td>" + availability +  '</td></tr>';
        
        
    }
    document.getElementById("table").innerHTML = str;
});

function filter() {
    let author_el = document.getElementById('author');
    let name_el = document.getElementById('title');
    let category_el = document.getElementById('category')

    if (author_el.value != '') {
        filterAuthor(author_el.value)
    }
    else if (name_el.value != '') {
        filterName(name_el.value)
    }
    else if (category_el.value != '') {
        filterCategory(category_el.value)
    }
    else {
        axios.get('http://localhost:8000/books/').then(resp => {
            let books = resp.data
            var str = '<tr class="header"><th class="title_col">Name</th><th class="author_col">Authors</th><th class="category_col">Categories</th><th class="publication_col">Publication</th><th class="availablity_col">Availablity</th></tr>'
            for (let i = 0 ; i < books.length ; i++) {
                console.log(books[i])
                let name = books[i].name
                let authors = books[i].authors.toString()
                let publications = books[i].publications.toString()
                let categories = books[i].categories.toString()
                let availability = books[i].availability

                str += '<tr><td>'+ name + "</td><td>" + authors + "</td><td>" + categories + "</td><td>" + publications + "</td><td>" + availability +  '</td></tr>';
                
                
            }
            document.getElementById("table").innerHTML = str;
        });
    }
}

function filterName(name) {
    axios.get('http://localhost:8000/books/').then(resp => {
        let books = resp.data
        var str = '<tr class="header"><th class="title_col">Name</th><th class="author_col">Authors</th><th class="category_col">Categories</th><th class="publication_col">Publication</th><th class="availablity_col">Availablity</th></tr>'
        for (let i = 0 ; i < books.length ; i++) {
            let book_name = books[i].name
            if (book_name == name) {
                let authors = books[i].authors.toString()
                let publications = books[i].publications.toString()
                let categories = books[i].categories.toString()
                let availability = books[i].availability
                
                str += '<tr><td>'+ name + "</td><td>" + authors + "</td><td>" + categories + "</td><td>" + publications + "</td><td>" + availability +  '</td></tr>';
                 
            }
        }
        document.getElementById("table").innerHTML = str;
    });
}

function filterCategory(name) {
    axios.get('http://localhost:8000/categories/').then(resp => {
        let categories = resp.data
        for (let i = 0 ; i < categories.length ; i++) {
            let category_name = categories[i].name
            if (category_name == name) {
                let books = categories[i].books
                var str = '<tr class="header"><th class="title_col">Name</th><th class="author_col">Authors</th><th class="category_col">Categories</th><th class="publication_col">Publication</th><th class="availablity_col">Availablity</th></tr>'
                for (let j = 0 ; j < books.length ; j++) {
                    let name = books[j].name
                    let authors = books[j].authors.toString()
                    let publications = books[j].publications.toString()
                    let categories = books[j].categories.toString()
                    let availability = books[j].availability
            
                    
                    str += '<tr><td>'+ name + "</td><td>" + authors + "</td><td>" + categories + "</td><td>" + publications + "</td><td>" + availability +  '</td></tr>';
                    
                }
                document.getElementById("table").innerHTML = str;
                break;
            }
        }
    });
}

function filterAuthor(name) {
    axios.get('http://localhost:8000/authors/').then(resp => {
        let authors = resp.data
        for (let i = 0 ; i < authors.length ; i++) {
            let author_name = authors[i].name
            if (author_name == name) {
                let books = authors[i].books
                var str = '<tr class="header"><th class="title_col">Name</th><th class="author_col">Authors</th><th class="category_col">Categories</th><th class="publication_col">Publication</th><th class="availablity_col">Availablity</th></tr>'
                for (let j = 0 ; j < books.length ; j++) {
                    let name = books[j].name
                    let authors = books[j].authors.toString()
                    let publications = books[j].publications.toString()
                    let categories = books[j].categories.toString()
                    let availability = books[j].availability
            
                    
                    str += '<tr><td>'+ name + "</td><td>" + authors + "</td><td>" + categories + "</td><td>" + publications + "</td><td>" + availability +  '</td></tr>';
                    
                }
                document.getElementById("table").innerHTML = str;
                break;
            }
        }
    });
}