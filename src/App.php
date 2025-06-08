<?php
namespace App;

use League\CLImate\CLImate;
use Symfony\Component\Filesystem\Filesystem;
use Dotenv\Dotenv;

class App {
    protected $climate;
    protected $fs;

    public function __construct(CLImate $climate) {
        $this->climate = $climate;
        $this->fs = new Filesystem();
    }

    public function run() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        $this->climate->green($_ENV['APP_NAME']);

        $input = $this->climate->input("Digite o caminho do arquivo .txt:");
        $filepath = $input->prompt();

        if (!$this->fs->exists($filepath)) {
            $this->climate->error("Arquivo não encontrado!");
            return;
        }

        $conteudo = file_get_contents($filepath);
        $this->climate->out("Arquivo carregado com sucesso!");

        $palavras = str_word_count($conteudo, 1);
        $total = count($palavras);

        $this->climate->lightBlue()->out("Total de palavras: $total");
    }
}
