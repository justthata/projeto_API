async function carregarDados(){
    const url = "http://localhost/projeto_API/api/produto"
    
    try {
        const resultado = await fetch(url)
        const dados = await resultado.json()
        
        
        console.log(dados.data)
        for(elementos of dados.data){
            console.log(elementos)
        }

    } catch(error){
        console.log(`O seguinte erro ocorreu: ${error}`)

    }


   
}
carregarDados()