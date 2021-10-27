from selenium import webdriver
from selenium.webdriver.edge.service import Service

url = "http://45.79.43.178/source_carts/wordpress/wp-admin/"
s = Service("C:\Program Files (x86)\chromedriver.exe")
driver = webdriver.Chrome(service = s)
driver.maximize_window()
driver.get(url)

username_textbox =driver.find_element_by_id("user_login")
username_textbox.send_keys("admin")

pass_texbox =driver.find_element_by_id("user_pass")
pass_texbox.send_keys("123456aA")

login_button = driver.find_element_by_id("wp-submit")
login_button.submit()

getname = driver.find_element_by_class_name("display-name").text

print(getname)
