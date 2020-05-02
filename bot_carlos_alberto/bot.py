import requests
import telebot
import re
from telebot.types import InlineKeyboardMarkup, InlineKeyboardButton

bot = telebot.TeleBot("")
urlApi = "localhost/?contarPiada"

def consultarApiPiada():
    retorno = requests.get(url = urlApi) 
    return retorno.json()

def getPiada():
    retornoAPi = consultarApiPiada()
    return retornoAPi['piada']

@bot.message_handler(commands=['piada'])
def send_welcome(message):
    bot.reply_to(message, getPiada())

@bot.message_handler(func=lambda message: True)
def echo_all(message):
    bot.reply_to(message, "Use /piada pra eu te contar uma piada!")

bot.polling(none_stop=True)