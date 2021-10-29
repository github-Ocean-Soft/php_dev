import requests
import json
import csv
from pandas.io.json import json_normalize
import pandas as pd
apikey = 'b1e68dc0e5bca112505189d9a209c3e3'
password = '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'
hostname = 'nvt01012021.myshopify.com'
version = '2021-10'
resource = 'customers'
API_url = f'https://{apikey}:{password}@{hostname}/admin/api/{version}/{resource}.json'
response_API = requests.get(API_url)

data = response_API.text
parse_json = json.loads(data)

customer_data = parse_json['customers']
df = pd.DataFrame(data=customer_data)

for item in customer_data:
    item['addresses'] = ''

df.to_csv('output.csv',index=False)