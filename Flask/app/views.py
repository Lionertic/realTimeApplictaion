from app import app
import os

@app.route("/app/")
def index():
    return "Hello from Flask"
