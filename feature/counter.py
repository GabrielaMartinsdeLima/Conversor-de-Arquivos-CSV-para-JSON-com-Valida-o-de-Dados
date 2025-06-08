def contar_palavras(caminho_arquivo):
    contagem = {}
    with open(caminho_arquivo, 'r', encoding='utf-8') as f:
        for linha in f:
            palavras = linha.strip().split()
            for palavra in palavras:
                palavra = palavra.lower().strip('.,!?()[]')
                if palavra:
                    contagem[palavra] = contagem.get(palavra, 0) + 1
    return contagem