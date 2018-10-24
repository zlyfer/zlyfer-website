import os
import json
import codecs
import logging
import requests
from bs4 import BeautifulSoup

os.chdir("home/zlyfer/zlyfer-website/resources/hs-fulda/")
logging.basicConfig(format="\n%(levelname)s: @'%(asctime)s' in '%(name)s':\n> %(message)s", level=logging.INFO)

credentials = json.loads(codecs.open('/home/zlyfer/tokens/hs-fulda_credentials.json', 'r', 'utf-8').read())
url1 = 'https://elearning.hs-fulda.de/ai/login/index.php'
url2 = 'https://elearning.hs-fulda.de/ai/mod/journal/edit.php?id=20748'

session = requests.session()
session.post(url1, data=credentials)
response = session.get(url2).text
soup = BeautifulSoup(response, "html.parser")
content = soup.get_text("\n").split("\n")
record = False
journal = ''
for line in content:
    if 'crawler_end' in line:
        record = False
    if record == True:
        journal += line + "\n"
    if 'crawler_start' in line:
        record = True
codecs.open('ai1001-lerntagebuch.html', 'w', 'utf-8').write(journal)
