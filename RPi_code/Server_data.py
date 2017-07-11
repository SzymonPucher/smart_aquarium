import urllib.request

def get_config():
    with urllib.request.urlopen('http://szymonpucher.com/smartaquarium/config.txt') as url:
        s = str(url.read())

    
    b = []
    c = 0
    ''''''
    for i in s:
        if i.isdigit():
            b.append(i)
            c = c+1
        else:
            if c > 0:
                b.append('x')
            c = 0
            
    ''''''
    
    i = len(b) - 1
    data = []
    count = 1
    num = 0
    while i:
      i=i-1
      if b[i] == 'x':
        count = 1
        data.append(num)
        num = 0
      else:
        num = num+int(b[i])*count
        count = count*10
    data.append(num)
    data.reverse()
    print(data)
    return data
