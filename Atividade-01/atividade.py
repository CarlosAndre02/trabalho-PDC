import requests

url = 'https://v6.exchangerate-api.com/v6/2f7eee027ab8043e43f030c2/latest/USD'

response = requests.get(url)
data = response.json()

print("Valor de câmbio do real em relação ao dolar: ", data["conversion_rates"]["BRL"])
print("Valor de câmbio do euro em relação ao dolar: ", data["conversion_rates"]["EUR"])
print("Valor de câmbio do Iene em relação ao dolar: ", data["conversion_rates"]["JPY"])