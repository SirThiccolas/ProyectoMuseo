<?php
if ($_SESSION['rol'] != "admin") {
    echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
}
?>
<div class='eleccionVocabulario'>
    <h1>Selecciona un vocabulari</h1>
    <div>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=autores"><button>Autors</button></a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=causasBaja"><button>Causes de baixa</button></a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=datacions"><button>Datacions</button></a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=estatsConservacio"><button>Estats de conservació</button></a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=formesIngres"><button>Formes d'ingrès</button></a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=tipusExposicio"><button>Tipus d'exposició</button></a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=material"><button>Materials</button></a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=tecnica"><button>Tecniques</button></a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=getty"><button>Codis Getty</button></a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=classificacio"><button>Classificacio generica</button></a>
    </div>
</div>