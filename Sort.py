a = map(int, input().split())
def down(a):
  return sort(a)
  
def cocktail(a):
    for i in range(len(a)//2):
        swap = False
        for j in range(1+i, len(a)-i):
            # test whether the two elements are in the wrong order
            if a[j] < a[j-1]:
                # let the two elements change places
                a[j], a[j-1] = a[j-1], a[j]
                swap = True
        # we can exit the outer loop here if no swaps occurred.
        if not swap:
            break
        swap = False
        for j in range(len(a)-i-1, i, -1):
            if a[j] < a[j-1]:
                a[j], a[j-1] = a[j-1], a[j]
                swap = True
        if not swap:
            break

 #ЭТО КОД ТИМУРА
def mergeSort(alist):
    if len(alist) > 1:
        mid = len(alist) // 2
        lefthalf = alist[:mid]
        righthalf = alist[mid:]

        mergeSort(lefthalf)
        mergeSort(righthalf)

        i = 0
        j = 0
        k = 0
        while i < len(lefthalf) and j < len(righthalf):
            if lefthalf[i] < righthalf[j]:
                alist[k] = lefthalf[i]
                i = i + 1
            else:
                alist[k] = righthalf[j]
                j = j + 1
            k = k + 1

        while i < len(lefthalf):
            alist[k] = lefthalf[i]
            i = i + 1
            k = k + 1

        while j < len(righthalf):
            alist[k] = righthalf[j]
            j = j + 1
            k = k + 1
    return ' '.join(map(str, alist))
#код тимура закончен
#тут был костя 


num_list = [75, 16, 55, 19, 48, 14, 2, 61, 22, 100]
print("Before: ", num_list)
cocktail(num_list)
print("After:  ", num_list)