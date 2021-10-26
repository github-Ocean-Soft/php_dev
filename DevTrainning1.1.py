from bs4 import BeautifulSoup
import requests
payload = {
    'log': 'admin',
    'pwd': '123456aA'
}
with requests.Session() as s:
    #url = 'http://45.79.43.178/source_carts/wordpress/wp-admin'
    p=s.post('http://45.79.43.178/source_carts/wordpress/wp-login.php',data=payload)
    soup = BeautifulSoup(p.content,"html.parser")
    results = soup.find('span',class_='display-name')
    print(results.contents)
