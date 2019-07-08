from flask import Flask
from flask import jsonify

app = Flask(__name__)

@app.route('/hi')
def index():
    return jsonify('Hello world')
