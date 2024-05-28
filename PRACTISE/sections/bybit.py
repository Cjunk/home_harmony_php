import requests
import time

def get_current_price():
    url = "https://api.bybit.com/v2/public/tickers?symbol=BTCUSD"
    response = requests.get(url)
    data = response.json()
    return float(data['result'][0]['last_price'])

while True:
    current_price = get_current_price()
    print(f"Current BTCUSD price: {current_price}")
    time.sleep(10)  # Sleep for 10 seconds before next request
