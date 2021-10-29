import csv
import pandas as pd
import mysql.connector as MySQL
from mysql.connector import Error
from sqlalchemy import create_engine

df = pd.read_csv('customer.csv')

engine =create_engine('mysql+mysqldb://root:@localhost/php_dev')
conn = MySQL.connect(host="localhost",user ="root", passwd="",database="php_dev" )
cursor = conn.cursor()

if conn.is_connected():
    cursor.execute('DROP TABLE IF EXISTS customer')
    cursor.execute("""CREATE TABLE customer( customerid int not null primary key,
    firstname varchar(255),lastname varchar(255), companyname varchar(255),
    billingaddress1 varchar(255),billingaddress2 varchar(255),
    city varchar(255),state varchar(255),postalcode varchar(255),country varchar(255),
    phonenumber varchar(255),emailaddress varchar(255),createddate varchar(255));""")
df.to_sql(name='customer',con=engine,if_exists='replace')
conn.commit()
cursor.close()
conn.close()