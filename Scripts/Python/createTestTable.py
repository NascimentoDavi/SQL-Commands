import pyodbc

server = 'localhost'
database = 'Default'
username = 'FAESA\\estagiario.nti02'
password = ''

# Establish the connection
connection_string = f'DRIVER={{ODBC Driver 18 for SQL Server}};SERVER={server};DATABASE={database};UID={username};PWD={password};TrustServerCertificate=yes;Trusted_Connection=yes'
connection = pyodbc.connect(connection_string)

# Create a cursor object
cursor = connection.cursor()

cursor.execute('''
IF OBJECT_ID('TestTable', 'U') IS NULL
BEGIN
    CREATE TABLE TestTable (
        ID INT PRIMARY KEY,
        Name NVARCHAR(50)
    )
END;
''')

# Example: Insert data into the table
cursor.execute("INSERT INTO TestTable (ID, Name) VALUES (?, ?)", (1, 'John Doe'))
connection.commit()

# Example: Query data from the table
# cursor.execute("SELECT * FROM TestTable")
# rows = cursor.fetchall()

# Print the results
# for row in rows:
#     print(f'ID: {row.ID}, Name: {row.Name}')

# Close the cursor and connection
cursor.close()
connection.close()