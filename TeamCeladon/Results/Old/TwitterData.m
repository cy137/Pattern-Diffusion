function PCA()
ProcessedData = importdata('ProcessedData.txt',',');
X = ProcessedData';
A = X' * X;
[V,D] = eig(A);
d  = diag(D);
bar(d(end-9:end));
x = V(:,end);
Y = V(:,end-1);
Z = V(:,end-1);
figure(1)
scatter(x,Y, 'filled');
% C contains the array of values that each tweet matches
C = kmeans(transpose(X),2);
figure(2)
scatter(x,Y,50,C,'filled');
figure(3)
scatter3(x,Y,Z,50,C,'filled');
