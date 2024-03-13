
async function loadCnpj(event) {
    event.preventDefault()
    const cnpj = document.getElementById('cnpj_input').value

    await fetch(`https://brasilapi.com.br/api/cnpj/v1/${cnpj}`)
        .then(res => {
            if (res.ok) {
                return res.json()
            } else {
                throw new Error('Bad Request');
            }
        })
        .then(data => {
            fillHtmlForms(data)
        })
        .catch(error => {
            throw new Error('CNPJ not found.');
        })
}

async function getCEP(cep) {
    await fetch(`https://brasilapi.com.br/api/cep/v1/${cep}`)
        .then(res => {
            if (res.ok) {
                return res.json()
            } else {
                throw new Error('Bad Request');
            }
        })
        .then(data => {
            fillCepInfo(data)
        })
        .catch(error => {
            throw new Error('CNPJ not found.');
        })
}

function fillHtmlForms(data) {
    const fields = ['razao_social', 'nome_fantasia', 'numero', 'bairro', 'complemento', 'pais', 'uf','cep']

    for (i in fields) {
        console.log(fields[i],data[fields[i]]) 
        document.getElementById(fields[i]).value = data[fields[i]]
    }

    getCEP(data['cep'])
}

function fillCepInfo(data) {
    document.getElementById('municipio').value = data['city']
    document.getElementById('logradouro').value = data['street']
}
