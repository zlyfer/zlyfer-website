import os
import json
import codecs
import logging
import requests
from bs4 import BeautifulSoup

# os.chdir("home/zlyfer/zlyfer-website/resources/")
logging.basicConfig(format="\n%(levelname)s: @'%(asctime)s' in '%(name)s':\n> %(message)s", level=logging.INFO)

credentials = json.loads(codecs.open('./credentials.json', 'r', 'utf-8').read())
url1 = 'https://elearning.hs-fulda.de/ai/login/index.php'
url2 = 'https://elearning.hs-fulda.de/ai/mod/journal/edit.php?id=20748'

def getHTML():
    session = requests.session()
    session.post(url1, data=credentials)
    response = session.get(url2).text
    file = codecs.open('.junk', 'w', 'utf-8')
    soup = BeautifulSoup(response, "html.parser")
    file.write(soup.get_text("\n"))
    file.close

def getJournal():
    file = codecs.open('.junk', 'r', 'utf-8')
    content = file.readlines()
    file.close
    record = False
    journal = ''
    for line in content:
        if 'crawler_end' in line:
            record = False
        if record == True:
            journal += line
        if 'crawler_start' in line:
            record = True
    codecs.open('ai1001-lerntagebuch.html', 'w', 'utf-8').write(journal)

getHTML()
getJournal()
