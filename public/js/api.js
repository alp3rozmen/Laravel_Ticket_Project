var url = window.location.origin + '/ticketProject';

function updateTicket(id, exp, stat, categ) {

    const requestBody = {
        id : id,
        explanation : exp,
        status : stat,
        category : categ

    };

    fetch(url + '/public/api/updateticket', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', // JSON verisi gönderildiğini belirtin
        },
        body: JSON.stringify(requestBody), // JavaScript nesnesini JSON verisine dönüştürün
    })
    .then(response => {
        return response.json(url + '/updateticket'); // Yanıtı JSON olarak işle
        
    })
    .then(data => {
        if (data.status === '200') {
            $('#example').DataTable().ajax.reload();
            alertify.success(data.messages); 
        }else{
            alertify.error(data.messages);
        }
        

    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });  
}


function removeTicket(id) {

    const requestBody = {
        id : id,
    };

    fetch(url + '/public/api/removeticket', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', // JSON verisi gönderildiğini belirtin
        },
        body: JSON.stringify(requestBody), // JavaScript nesnesini JSON verisine dönüştürün
    })
    .then(response => {
        return response.json(url + '/removeticket'); // Yanıtı JSON olarak işle
        
    })
    .then(data => {
        if (data.status === '200') {
            $('#example').DataTable().ajax.reload();
            alertify.success(data.messages); 
        }else{
            alertify.error(data.messages);
        }
        

    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });  
}


function login(Inputemail, Inputpassword) {

    if ((Inputemail === '') || (Inputpassword === '')) {
      alertify.error("Lütfen Boş Alanları Doldurun!"); 
      process.exit(1);
    }
    

    // İstek gövdesi (request body)
    const requestBody = {
        email: Inputemail,
        password: Inputpassword,
    };


    fetch(url + '/public/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', // JSON verisi gönderildiğini belirtin
        },
        body: JSON.stringify(requestBody), // JavaScript nesnesini JSON verisine dönüştürün
    })
    .then(response => {
        return response.json(url + '/home'); // Yanıtı JSON olarak işle
    })
    .then(data => {
        if (data.status === '200') {
            redirectPage(url + '/public/home', 2);
            alertify.success(data.messages); 
        }else{
          alertify.error(data.messages);
        }
                 
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}

function register(InputName, Inputemail, Inputpassword) {

    if ((InputName === '') || (Inputemail === '') || (Inputpassword === '')) {
        alertify.error("Lütfen Boş Alanları Doldurun!"); 
        process.exit(1);
    }

    // İstek gövdesi (request body)
    const requestBody = {
        name : InputName,
        email: Inputemail,
        password: Inputpassword,
    };

    fetch(url + '/public/api/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', // JSON verisi gönderildiğini belirtin
        },
        body: JSON.stringify(requestBody), // JavaScript nesnesini JSON verisine dönüştürün
    })
    .then(response => {
        return response.json(url + '/home'); // Yanıtı JSON olarak işle
        
    })
    .then(data => {
        if (data.status === '200') {
            redirectPage(url + '/public/login', 2);
            alertify.success(data.messages); 
        }else{
            alertify.error(data.messages);
        }
        

    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}

function addTicket(category, explanation) {

    if ((category === '') || (explanation === '')) {
        alertify.error("Lütfen Boş Alanları Doldurun!"); 
        process.exit(1);
    }

    // İstek gövdesi (request body)
    const requestBody = {
        category : category,
        explanation : explanation,
    };

    fetch(url + '/public/api/addticket', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', // JSON verisi gönderildiğini belirtin
        },
        body: JSON.stringify(requestBody), // JavaScript nesnesini JSON verisine dönüştürün
    })
    .then(response => {
        return response.json(url + '/home'); // Yanıtı JSON olarak işle
        
    })
    .then(data => {
        if (data.status === '200') {
            alertify.success(data.messages); 
        }else{
            alertify.error(data.messages);
        }
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}


function listicket() {
    return new Promise((resolve, reject) => {
        fetch(url + '/public/api/listicket', {
            method: 'GET'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('HTTP error ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            if (data.status === '200') {
                alertify.success(data.messages);
                resolve(data); // Veriyi başarıyla döndür
            } else {
                alertify.error(data.messages);
                reject(data); // Hata durumunda veriyi reddet
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            reject(error); // Fetch işlemi sırasında bir hata olursa reddet
        });
    });
}


function redirectPage(adres, saniye) {
    
    setTimeout(function() {
        window.location.href = adres;
    }, saniye * 1000);

}