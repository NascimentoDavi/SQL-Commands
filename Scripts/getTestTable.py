import pyodbc

server = 'localhost'
database = 'Default'
username = 'FAESA\\estagiario.nti02'
password = ''

connection_string = f'DRIVER={{ODBC Driver 18 for SQL Server}};SERVER={server};DATABASE={database};UID={username};PWD={password};TrustServerCertificate=yes;Trusted_Connection=yes'
connection = pyodbc.connect(connection_string)

cursor = connection.cursor()

# Query data from the table
cursor.execute("SELECT * FROM TestTable")
rows = cursor.fetchall()

# Print the Results
for row in rows:
    print(f'ID: {row.ID}, Name: {row.Name}')

cursor.close()
connection.close()