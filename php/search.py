from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
import time

import selenium

driver = webdriver.Chrome(ChromeDriverManager().install())
driver.get("https://www.youtube.com/watch?v=4XpVtj1nQ0c")
driver.set_window_size(1024, 600)
driver.maximize_window()
search = driver.find_element_by_id("search")
search.send_keys('Am Tham Ben Em')