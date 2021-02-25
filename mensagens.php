<?php
function msg($msg){
    if($msg == 'facalogin'){
    echo '<div class="alert alert-danger" role="alert">
    Faça Login!
    </div>';
    }elseif($msg == 'errlogin'){
            echo '<div class="alert alert-danger" role="alert">
            Email ou Senha Errados!
            </div>';
    }elseif($msg == 'saveSuccess'){
                    echo '<div class="alert alert-success" role="alert">
            Salvo com Sucesso!
            </div>';
    }elseif($msg == 'saveErr'){
            echo '<div class="alert alert-danger" role="alert">
            Erro ao Salvar!
        </div>';
    }elseif($msg == 'delSuccess'){
        echo '<div class="alert alert-success" role="alert">
        Excluído com Sucesso!
    </div>';
        }elseif($msg == 'delErr'){
                echo '<div class="alert alert-danger" role="alert">
                Erro ao excluir!
            </div>';
        }elseif($msg == 'saveDuplicate'){
                echo '<div class="alert alert-danger" role="alert">
                Email já Cadastrado!
            </div>';
                }elseif($msg == 'editErr'){
                    echo '<div class="alert alert-danger" role="alert">
                    Erro ao Editar os Dados!
                </div>';
                    }
                    elseif($msg == 'editSuccess'){
                        echo '<div class="alert alert-success" role="alert">
                       Editado com ducesso!
                    </div>';
                        }
}
?>