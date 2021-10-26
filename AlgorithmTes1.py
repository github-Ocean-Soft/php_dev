def sumTo100():
    s = '123456789'
    def helper(i, slate, slatesum):
        if i == len(s):
            if slatesum == 100:
                res.append(''.join(slate))
            return
        for j in range(i, len(s)):
            val_str = s[i:j+1]
            val = int(val_str)
            slate.extend(['+', val_str])
            helper(j+1, slate, slatesum+val)
            slate[-2] = '-'
            helper(j+1, slate, slatesum-val)
            slate.pop(); slate.pop()
    helper(0, [], 0)

res = []
sumTo100()
for r in res:
    if r[0] == '+': r=r[1:]
    print(r+'=100')




