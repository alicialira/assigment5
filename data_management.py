from urllib.parse import parse_qs
import cgi
import sys

# Função para processar os dados
def process_data(params):
    # Extrai os números dos parâmetros
    try:
        numbers = [int(params.get(key)[0]) for key in ["a", "b", "c", "d", "e"]]
    except (ValueError, TypeError):
        return "<h3>Error: Please provide numeric values for all inputs.</h3>"

    # Verifica se todos os valores são numéricos e não-nulos
    if any(not isinstance(num, int) for num in numbers):
        return "<h3>Error: All inputs must be numeric.</h3>"

    # Verifica se algum número é negativo
    if any(num < 0 for num in numbers):
        return "<h3>Warning: One or more values are negative.</h3>"

    # Calcula a média e verifica se é maior que 50
    average = sum(numbers) / len(numbers)
    average_message = f"<h3>Average of numbers: {average}</h3>"
    if average > 50:
        average_message += "<p>The average is greater than 50.</p>"

    # Determina se o número de valores positivos é par ou ímpar usando operações bitwise
    positive_count = sum(1 for num in numbers if num > 0)
    parity_message = (
        "<p>Count of positive numbers is even.</p>" if positive_count & 1 == 0
        else "<p>Count of positive numbers is odd.</p>"
    )

    # Cria uma nova lista com valores maiores que 10, ordena e retorna as listas
    greater_than_ten = sorted([num for num in numbers if num > 10])
    original_list = f"<p>Original list: {numbers}</p>"
    sorted_list = f"<p>List with values > 10 (sorted): {greater_than_ten}</p>"

    # Gera saída HTML
    return f"""
        {average_message}
        {parity_message}
        {original_list}
        {sorted_list}
    """

# Pega os parâmetros da URL (a partir de `QUERY_STRING`)
query_string = sys.stdin.read()
params = parse_qs(query_string)

# Gera e imprime a resposta HTML
print("Content-Type: text/html\n")
print("<html><body>")
print("<h2>Data Processing Results</h2>")
print(process_data(params))
print("</body></html>")
