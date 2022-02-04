

import feedparser
import mysql.connector
import re
from datetime import datetime, timedelta
import json


##############################################################################################################################################################################################
#   Connects to mySQL
##############################################################################################################################################################################################


mydb = mysql.connector.connect(
  host="DATABASE HERE",
  user="USERNAME HERE",
  password="PASSWORD HERE",
  database="default"
)

##############################################################################################################################################################################################
#   Checks for emails
##############################################################################################################################################################################################

mycursor = mydb.cursor()
strStatSelect = ("SELECT strEmail from contacts WHERE intStatus = 0")
arrStatusEmails = []
mycursor.execute(strStatSelect)
myresultStatus = mycursor.fetchall()
for x in myresultStatus:
    tempEmail = x[0]
    arrStatusEmails.append(tempEmail)

##############################################################################################################################################################################################
#   Sends Status Email
##############################################################################################################################################################################################

def EmailStatusSend(statusEmail):
  import smtplib, ssl
  from email.mime.text import MIMEText
  from email.mime.multipart import MIMEMultipart

  sender_email = "EMAIL HERE"
  receiver_email = statusEmail
  password = "PASSWORD HERE"

  message = MIMEMultipart("alternative")
  message["Subject"] = "Email signup Confirmation"
  message["From"] = sender_email
  message["To"] = receiver_email

# Create the plain-text and HTML version of your message
  text = "Confirmation"

  html = """\
  <html>
    <body>
      <p>We have confirmed your email. You will now receive updates on price drops in the future. Thank you!<br> 
      </p>
      </p><p><a href="http://pcsales.io/remove.php">Or click here to stop receiving emails</a></p>
      <br>
      <br>
    </body>
  </html>
  """

# Turn these into plain/html MIMEText objects
  part1 = MIMEText(text, "plain")
  part2 = MIMEText(html, "html")

# Add HTML/plain-text parts to MIMEMultipart message
# The email client will try to render the last part first
  message.attach(part1)
  message.attach(part2)

# Create secure connection with server and send email
  context = ssl.create_default_context()
  with smtplib.SMTP_SSL("smtp.gmail.com", 465, context=context) as server:
      server.login(sender_email, password)
      server.sendmail(
          sender_email, receiver_email, message.as_string()
      )

for x in arrStatusEmails:
    EmailStatusSend(x)

##############################################################################################################################################################################################
#   Updates database entries so users don't get multiple emails
##############################################################################################################################################################################################

mycursor = mydb.cursor()
strUpdate = "UPDATE contacts SET intStatus = 1 WHERE intStatus = 0"
print(strUpdate)
mycursor.execute(strUpdate)
mydb.commit()





feed = "https://old.reddit.com/r/buildapcsales/new/.rss"

NewsFeed = feedparser.parse(feed)
#print('Number of RSS posts :', len(NewsFeed.entries))
##############################################################################################################################################################################################
#   sets variables for info needed for feedparser
##############################################################################################################################################################################################
entry = NewsFeed.entries[0]
title = entry.title
link = entry.link
#print(entry.title)

##############################################################################################################################################################################################
#   sets variables need to get the price from a string
##############################################################################################################################################################################################

price = str(entry.title)
expr = '(?:[\£\$\€]{1}[,\d]+.?\d*)'

##############################################################################################################################################################################################
#   Gives list of all currencies in title 
##############################################################################################################################################################################################

match2 = re.findall(expr, price)
#print(match2)

##############################################################################################################################################################################################
#   Sets pricelist variable to list of all currencies
##############################################################################################################################################################################################

pricelist = match2

##############################################################################################################################################################################################
#   gets currency based on number of prices in title. Returns numeric values as well as strings for prices (numprice 2 = currency formatted)
#f  inal price is the final price as a string that includes the orig price as well as discoutn if available
##############################################################################################################################################################################################

if len(pricelist) == 3:
     
    price2 = str(pricelist[1])
    price3 = str(pricelist[2])
    price11 = pricelist[0]


    numprice = float(pricelist[0].replace("$", ""))
    numprice2 = ('%.2f' %numprice)
    finalprice = (price11 + " (" + price2 + " - " + price3 + ")")
elif len(pricelist) == 2:
    numprice = float(pricelist[0].replace("$", ""))
    numprice2 = ('%.2f' %numprice)
    finalprice = str(pricelist[0])
elif len(pricelist) == 1:
    numprice = float(pricelist[0].replace("$", ""))
    numprice2 = ('%.2f' %numprice)
    finalprice = str(pricelist[0])
elif len(pricelist) > 3:
    numprice = float(pricelist[0].replace("$", ""))
    numprice2 = ('%.2f' %numprice)
    finalprice = str(pricelist[0])
else :
    numprice2 = 0
    finalprice = "n/a"

###############################################################################################
#   numprice2 and final price should be passed thru to sql server numprice2 is dec final price is str
###############################################################################################
#print(numprice2)
#print(finalprice)
###############################################################################################
#   modifies description to remove all parentheses as well as brackets
###############################################################################################
descript = str(entry.title)
descript2 = descript.replace("[", "(")
descript3 = descript2.replace("]", ")")
descript4 = re.sub(r"\([^()]*\)", "", descript3)
descript5 = re.sub(r'(?:[\£\$\€]{1}[,\d]+.?\d*)', "", descript4)
###############################################################################################
#   checks to make sure string doesn't end with special character. If it does, removes special character and repeats until all special characters are gone
###############################################################################################
if descript5[-1] is (not c.isalnum() for c in descript5):
    descript6 = descript5[:-1]

    if descript6[-1] is (not c.isalnum() for c in descript6):
        descript7 = descript6[:-1]

        if descript7[-1] is (not c.isalnum() for c in descript7):
            descript8 = descript7[:-1]
        else:
            descript8 = descript7   

    else:
        descript7 = descript6
        descript8 = descript7


else:
    descript8 = descript5
###############################################################################################
#   Removes first character of string bc it is always a space
###############################################################################################
if descript8[0] == " ":
    descript9 = descript8[1:]
    descriptionFinal = descript9
else:
    descriptionFinal = descript8

###############################################################################################
#   description is what is passed thru to mysql
###############################################################################################

print(descriptionFinal)

##############################################################################################################################################################################################
#      Creates Datime variable. stampDTM is passed through to sql
##############################################################################################################################################################################################

currentDTM = datetime.now()

print(currentDTM)

##############################################################################################################################################################################################
#   Creates redditlink variable. redditlink is passed thru to mySQL
##############################################################################################################################################################################################

redditlink = link

#print(entry.content)
##############################################################################################################################################################################################
# Creates item link variable to be passed thru to mySQL.    itemlink is passed thru
##############################################################################################################################################################################################
content = str(entry.content)

contURL = re.findall("(?P<url>https?://[^\s]+)", content)
#print(this)

itemlinkIso = str(contURL[2])

if 'amazon' in itemlinkIso:
    itemlinkIso2 = itemlinkIso[:-19]
    amazonLink = itemlinkIso2
    print(amazonLink)
else:
    print("NOPE NOT AMAZON")



for i in contURL:
    if "redd" in i:
        continue
    else:
        shortURL = i
        finalURL = shortURL[:-19]


contURLSliced = itemlinkIso[:-19]

itemlink = contURLSliced

print("\nHERE\n")
print(str(descript))

##############################################################################################################################################################################################
# Does the stuff for camel camel camel
##############################################################################################################################################################################################

if 'amazon' in itemlinkIso:
    camelLink = "https://camelcamelcamel.com/search?sq={}".format(amazonLink)
    print("\n")
    print(camelLink)
    print("\n")
else:
    camelLink = 'n/a'
    print("NOPE NOT AMAZON")



##############################################################################################################################################################################################
# Creates category variable to be passed thru to mySQL
##############################################################################################################################################################################################


catRaw = re.findall(r"\[([A-Za-z0-9_]+)\]", title)
print(catRaw)
catFirst = catRaw[0]
catFirstUpper = catFirst.upper()
print(catFirstUpper)
print("      ")
print("      ")


##############################################################################################################################################################################################
#   Defines categories based off fuzzy search. catPass should be passed thru to SQL
##############################################################################################################################################################################################

from fuzzywuzzy import process
highest = 'Other'

def getcategory(catStr):

    str2Match = catStr
    strOptions = ["CPU","GPU","MOBO","PREBUILT", "PSU","HEADPHONES","NETWORK","MONITOR","SPEAKER","COOLING","FURNITURE","MOUSE", "KEYBOARD","CABLES","LAPTOP","HDD",
    "SSD","STORAGE","CASE","BUNDLE", "WEBCAM","RAM","OTHER","MIC","CONSOLE","ROUTER","NETWORKING","CHAIR", "CONTROLLER", "COOLER", "AIO", "NVMe"]
    Ratios = process.extract(str2Match,strOptions)
    print(Ratios)
    # You can also select the string with the highest matching percentage
    highest = process.extractOne(str2Match,strOptions)
    #print(highest)
    category = highest
    return category

print("      ")
print("      ")

category = getcategory(catFirstUpper)

catPass = category[0]
print(catPass)
print(category[1])

if category[1] < 50:
    catPass = 'OTHER'

##############################################################################################################################################################################################
#   inserts things into mySQL
##############################################################################################################################################################################################

mycursor = mydb.cursor()
#print(currentDTM)
strDTM = str(currentDTM)
DTMnoSec = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
print(DTMnoSec)


##############################################################################################################################################################################################
#   Checks to see if this entry has been submitted in last four hours if it hasn't continues if it has breaks
##############################################################################################################################################################################################

mycursor.execute("SELECT title, hardwareDTM FROM hardware WHERE hardwareDTM >= NOW() - INTERVAL 4 HOUR")
myresult = mycursor.fetchall()
for x in myresult:
    if descriptionFinal != x[0]:
        continue
    elif descriptionFinal == x[0]:
        exit()    



    # currentdate = str(x[1])
    # currentdate = currentdate[]
    # d1 = datetime.strptime(currentdate, "%H:%M:%S.%f")
    # d2 = datetime.strptime("01:00:00.000", "%H:%M:%S.%f")

    # print (d1-d2)
    
##############################################################################################################################################################################################
#   inserts things into mySQL
##############################################################################################################################################################################################

sql = "INSERT INTO hardware (category, title, redditlink, itemlink, price, finalprice, hardwareDTM, camellink) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"
val = (catPass, descriptionFinal, redditlink, finalURL, numprice2, finalprice, currentDTM, camelLink)
mycursor.execute(sql, val)

mydb.commit()

print("HEREaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
print(category)
print(sql, val)
print(mycursor.rowcount, "record inserted.")

##############################################################################################################################################################################################
#   Gets receiver's emails
##############################################################################################################################################################################################

if catPass == 'CPU':
    catSQL = 'intCPU'
elif catPass == 'GPU':
    catSQL = 'intGPU'
elif catPass == 'MOBO':
    catSQL = 'intMOBO'
elif catPass == 'PREBUILT':
    catSQL = 'intBundle'
elif catPass == 'PSU':
    catSQL = 'intPSU'
elif catPass == 'HEADPHONES':
    catSQL = 'intHeadphones'
elif catPass == 'NETWORK':
    catSQL = 'intNetworking'
elif catPass == 'MONITOR':
    catSQL = 'intMonitor'
elif catPass == 'SPEAKER':
    catSQL = 'intSpeaker'
elif catPass == 'COOLING':
    catSQL = 'intCooling'
elif catPass == 'FURNITURE':
    catSQL = 'intFurniture'
elif catPass == 'MOUSE':
    catSQL = 'intMouse'
elif catPass == 'KEYBOARD':
    catSQL = 'intKeyboard'
elif catPass == 'CABLES':
    catSQL = 'intCables'
elif catPass == 'LAPTOP':
    catSQL = 'intLaptop'
elif catPass == 'HDD':
    catSQL = 'intStorage'
elif catPass == 'SSD':
    catSQL = 'intSSD'
elif catPass == 'STORAGE':
    catSQL = 'intStorage'
elif catPass == 'CASE':
    catSQL = 'intCase'
elif catPass == 'BUNDLE':
    catSQL = 'intBundle'
elif catPass == 'WEBCAM':
    catSQL = 'intWebcam'
elif catPass == 'RAM':
    catSQL = 'intRAM'
elif catPass == 'OTHER':
    catSQL = 'intOther'
elif catPass == 'MIC':
    catSQL = 'intMic'
elif catPass == 'CONSOLE':
    catSQL = 'intConsole'
elif catPass == 'ROUTER':
    catSQL = 'intNetworking'
elif catPass == 'NETWORKING':
    catSQL = 'intNetworking'
elif catPass == 'CHAIR':
    catSQL = 'intChair'
elif catPass == 'CONTROLLER':
    catSQL = 'intController'
elif catPass == 'COOLER':
    catSQL = 'intCooling'
elif catPass == 'AIO':
    catSQL = 'intCooling'
elif catPass == 'NVMe':
    catSQL = 'intNVME'




print(catSQL)

strNewSelect = ("SELECT strEmail from contacts WHERE {} = 1".format(catSQL))
print(strNewSelect)


arrEmails = []


mycursor.execute(strNewSelect)
myresultNew = mycursor.fetchall()
for x in myresultNew:
    tempEmail = x[0]
    arrEmails.append(tempEmail)


















##############################################################################################################################################################################################
#   Sends Email
##############################################################################################################################################################################################


def EmailSend(usrEmail):
  import smtplib, ssl
  from email.mime.text import MIMEText
  from email.mime.multipart import MIMEMultipart

  sender_email = "EMAIL HERE"
  receiver_email = usrEmail
  password = "PASSWORD HERE"

  message = MIMEMultipart("alternative")
  message["Subject"] = descript
  message["From"] = sender_email
  message["To"] = receiver_email

# Create the plain-text and HTML version of your message
  text = str(entry.link)

  html = """\
  <html>
    <body>
      <p>New Flash Sale<br>
          <br>
        <a href={0}>Click Here</a> 
       
      </p><p><a href="http://pcsales.io/remove.php">Or click here to stop receiving emails</a></p>
      <br>
      <br>
    </body>
  </html>
  """.format(link)

# Turn these into plain/html MIMEText objects
  part1 = MIMEText(text, "plain")
  part2 = MIMEText(html, "html")

# Add HTML/plain-text parts to MIMEMultipart message
# The email client will try to render the last part first
  message.attach(part1)
  message.attach(part2)

# Create secure connection with server and send email
  context = ssl.create_default_context()
  with smtplib.SMTP_SSL("smtp.gmail.com", 465, context=context) as server:
      server.login(sender_email, password)
      server.sendmail(
          sender_email, receiver_email, message.as_string()
      )





for x in arrEmails:
    EmailSend(x)

