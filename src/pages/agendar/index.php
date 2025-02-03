<?php 

session_start();

if (!isset($_SESSION["id_usuario"])){
  header("location: ../login/login.php");
}


$logado = isset($_SESSION['id_usuario']);



include __DIR__ . "/../../../backend/controller/userController.php";
$userController = new userController();


$espacos = $userController->listarEspacoCadastrado();

if (!isset($_GET['id_espaco'])){
      header("location: ../home/index.php");
}

else{
      $id_espaco = $_GET["id_espaco"];  
  
  }

if (isset($_GET["sucesso"])) {
  echo "
  <script>
      // Exibe o modal quando a página é carregada
      document.addEventListener('DOMContentLoaded', function() {
          document.getElementById('success-modal').classList.add('show');
      });

      // Fecha o modal quando o botão de fechar é clicado
      document.querySelector('.close').addEventListener('click', function() {
          document.getElementById('success-modal').classList.remove('show');
      });
  </script>";
  
}
else if (isset($_GET["erro_reservaExistente"])){
  echo "
  <script>
      // Exibe o modal quando a página é carregada
      document.addEventListener('DOMContentLoaded', function() {
          document.getElementById('error-modal').classList.add('show');
      });

      // Fecha o modal quando o botão de fechar é clicado
      document.querySelector('.close').addEventListener('click', function() {
          document.getElementById('error-modal').classList.remove('show');
      });
  </script>";
}
else if (isset($_GET["erro_dataAntiga"])){
  echo "
  <script>
      // Exibe o modal quando a página é carregada
      document.addEventListener('DOMContentLoaded', function() {
          document.getElementById('error-modal-time').classList.add('show');
      });

      // Fecha o modal quando o botão de fechar é clicado
      document.querySelector('.close').addEventListener('click', function() {
          document.getElementById('error-modal-time').classList.remove('show');
      });
  </script>";
}




include __DIR__ . "/../../../backend/controller/reservaController.php";

$reservaController = new reservaController();

// $reservaController->fazerReserva(28,1,1,"2025-01-29","18:00:00");

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservas</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://unpkg.com/lucide-icons/dist/umd/lucide.css" rel="stylesheet">
</head>
<body>

  <header>
    <div class="H-esquerdo">
        <h2 style="cursor: pointer;"><a href="../home/index.php" style="text-decoration: none; color: white;">Início</a></h2>
        <h2>Explorar</h2>
        <h2>Sobre</h2>
    </div>
    <div class="H-direito">
        <?php if ($logado): ?>
            <a href="../perfil/perfil.php">
                <img src="../../../public/icons/perfil.svg" alt="Perfil" class="icone-perfil">
            </a>
        <?php else: ?>
            <a href="../login/login.php"><button>Entrar</button></a>
            <a href="../cadastro/index.php"><button>Cadastrar-se</button></a>
        <?php endif; ?>
    </div>
</header>

  <!-- Modal de Reserva Confirmada -->
  <div class="modal" id="success-modal">
    <div class="modal-content success">
      <i class="lucide-check-circle modal-icon"></i>
      <h3 class="modal-title">Reserva Confirmada!</h3>
      <p class="modal-text">Sua reserva foi realizada com sucesso. Enviaremos um e-mail com a confirmação dos detalhes.</p>
      <button class="modal-button" onclick="closeModal('success-modal')">Fechar</button>
    </div>
  </div>

  <!-- Modal de Reserva Indisponível -->
  <div class="modal" id="error-modal">
    <div class="modal-content error">
      <i class="lucide-x-circle modal-icon"></i>
      <h3 class="modal-title">Horário Indisponível</h3>
      <p class="modal-text">Desculpe, mas este horário já está totalmente reservado. Por favor, selecione outro horário ou data.</p>
      <button class="modal-button" onclick="closeModal('error-modal')">Escolher Outro Horário</button>
    </div>
  </div>

  <div class="modal" id="error-modal-time">
    <div class="modal-content error">
      <i class="lucide-x-circle modal-icon"></i>
      <h3 class="modal-title">Data Indisponível</h3>
      <p class="modal-text">Descuple, agendamos apenas datas para o proximo dia, e não no mesmo, selecione outra data.</p>
      <button class="modal-button" onclick="closeModal('error-modal-time')">Escolher Outro Data</button>
    </div>
  </div>

  <div class="container">
    <div class="hero">
      <div class="hero-overlay">
        <div class="hero-content">
          <h1 class="hero-title"> <?php $userController->getRoomById($id_espaco,"nome"); ?></h1>
          <!-- <p class="hero-subtitle">Culinária Francesa Contemporânea</p> -->
        </div>
      </div>
    </div>

    <div class="main-content">
      <div class="restaurant-description">
        <div class="description-content">
          <h2 class="description-title">Sobre <?php $userController->getRoomById($id_espaco,"nome"); ?></h2>
          <p class="description-text">
            <!-- Bem-vindo ao La Maison, um refúgio gastronômico onde a tradição francesa encontra a inovação contemporânea. Nossa cozinha, liderada pelo renomado Chef Pierre Dubois, combina técnicas clássicas francesas com ingredientes locais sazonais para criar experiências culinárias memoráveis. -->
            <?php $userController->getRoomById($id_espaco,"descricao"); ?>
          <!-- </p>
          <p class="description-text">
            Em um ambiente acolhedor e sofisticado, oferecemos um cardápio que muda sazonalmente, sempre mantendo nossos pratos signature que conquistaram nossos clientes mais fiéis. Nossa adega conta com uma seleção premium de vinhos franceses e internacionais, cuidadosamente selecionados para harmonizar com nossa gastronomia. -->
          </p>
          <div class="description-highlights">
            <div class="highlight-item">
              <i class="lucide-star highlight-icon"></i>
              <!-- <span>Estrela Michelin 2023</span> -->
            </div>
            <div class="highlight-item">
              <i class="lucide-utensils highlight-icon"></i>
              <!-- <span>Menu Degustação 7 Tempos</span> -->
            </div>
            <div class="highlight-item">
              <i class="lucide-wine highlight-icon"></i>
              <!-- <span>Carta de Vinhos Premiada</span> -->
            </div>
          </div>
        </div>
        <div class="description-image">
          <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&q=80&w=2070" alt="Pratos do La Maison" class="restaurant-img">
        </div>
      </div>

      <div class="reservation-form">
        <div class="form-header">
          <i class="lucide-utensils-crossed form-icon"></i>
          <h2 class="form-title">Faça sua Reserva</h2>
        </div>
        <form action="../../../backend/router/agendarRouter.php?id_espaco=<?php echo $id_espaco; ?>" method="POST" >
          <div class="form-grid">
            <div class="form-group">
              <label class="form-label">Data</label>
              <div class="input-wrapper">
                <i class="lucide-calendar input-icon"></i>
                <input name="data_selecionada" type="date" class="form-input" required> <!-- DATA AQUI!   -->
              </div>
            </div>

            <div class="form-group">
              <label class="form-label">Horário</label>
              <div class="input-wrapper">
                <i class="lucide-clock input-icon"></i>
                <select name="horario_selecionado" class="form-select" required> <!-- HORARIO AQUI!   -->
                  <option value="">Selecione</option>
                  <option value="18:00:00">18:00</option>
                  <option value="19:00:00">19:00</option>
                  <option value="20:00:00">20:00</option>
                  <option value="21:00:00">21:00</option>
                  <option value="22:00:00">22:00</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="form-label">Pessoas</label>
              <div class="input-wrapper">
                <i class="lucide-users input-icon"></i>
                <select name="pessoas_selecionadas" class="form-select" required>   <!-- PESSOAS AQUI!   -->
                  <option value="1">1 pessoa</option>
                  <option value="2" selected>2 pessoas</option>
                  <option value="3">3 pessoas</option>
                  <option value="4">4 pessoas</option>
                  <option value="5">5 pessoas</option>
                  <option value="6">6 pessoas</option>
                  <option value="7">7 pessoas</option>
                  <option value="8">8 pessoas</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Nome Completo</label>
            <input type="text" class="form-input" placeholder="Digite seu nome completo" required>
          </div>

          <div class="form-group">
            <label class="form-label">Telefone</label>
            <div class="input-wrapper">
              <i class="lucide-phone input-icon"></i>
              <input type="tel" class="form-input" placeholder="(00) 00000-0000" required>
            </div>
          </div>

          <button type="submit" class="submit-button">                <!--        BOTÂO AGENDAR AQUI!!-->
            Confirmar Reserva
          </button>

          <p class="form-disclaimer">
            Cancelamentos devem ser feitos com no mínimo 24 horas de antecedência
          </p>
        </form>
      </div>

      <!-- <div class="info-grid">
        <div class="info-card">
          <h3 class="info-title">Horário de Funcionamento</h3>
          <ul class="info-list">
            <li>Segunda - Quinta: 18:00 - 23:00</li>
            <li>Sexta - Sábado: 18:00 - 00:00</li>
            <li>Domingo: 18:00 - 22:00</li>
          </ul>
        </div>
        <div class="info-card">
          <h3 class="info-title">Localização</h3>
          <p class="info-text">
            Rua das Flores, 123<br>
            Centro, São Paulo - SP<br>
            CEP: 01234-567
          </p>
        </div>
      </div> -->
    </div>
  </div>

  <script>
    function handleReservation(event) {
      event.preventDefault();
      
      // Simulando uma verificação de disponibilidade
      // Para demonstração, vamos usar um número aleatório
      const isAvailable = Math.random() > 0.5;
      
      if (isAvailable) {
        document.getElementById('success-modal').classList.add('show');
      } else {
        document.getElementById('error-modal').classList.add('show');
      }
    }

    function closeModal(modalId) {
      document.getElementById(modalId).classList.remove('show');
    }
  </script>
</body>
</html>