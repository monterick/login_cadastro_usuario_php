function exclusao(id){
var escolha = confirm(`Certeza que deseja excluir o id: ${id} ?`);
if(escolha == true){
window.location.href = `controller/controller.php?operacao=excluir&id=${id}`;
}
}

function injectValue(id,nome,email,senha){
document.getElementById('editid').value = id;
document.getElementById('editnome').value = nome;
document.getElementById('editemail').value = email;
document.getElementById('editsenha').value = senha;
}