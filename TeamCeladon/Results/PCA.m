function PCA(ResultSetID)
ProcessedData = importdata(strcat(ResultSetID,'-ProcessedData.txt'),',');
X = ProcessedData';
A = X' * X;
[V,D] = eig(A);
%d  = diag(D);
%bar(d(end-9:end));
x = V(:,end);
Y = V(:,end-1);
Z = V(:,end-1);
figure(1)
image1 = scatter(x,Y, 'filled');
saveas(image1,strcat(ResultSetID,'-Image-1.jpg'),'jpg');
% C contains the array of values that each tweet matches
C = kmeans(transpose(X),2);
figure(2)
image2 = scatter(x,Y,50,C,'filled');
saveas(image2,strcat(ResultSetID,'-Image-2.jpg'),'jpg');
figure(3)
image3 = scatter3(x,Y,Z,50,C,'filled');
saveas(image3,strcat(ResultSetID,'-Image-3.jpg'),'jpg');
quit force;
