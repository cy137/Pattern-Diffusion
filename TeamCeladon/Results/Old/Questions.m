function Questions()
load('digits.mat');
v = X(:,1);
vReshape = reshape(v,16,16);
colormap(gray);
%image(vReshape);
A = transpose(X) * X;
colormap(jet);
%image(A);
[V,D] = eig(A);
d  = diag(D);
%bar(d(end-9:end));
x = V(:,end);
Y = V(:,end-1);
Z = V(:, end-2);
figure(1);
image1 = scatter(x,Y, 'filled');
saveas(image1,'image1.jpg','jpg');
C = kmeans(transpose(X),10);
figure(2);
image2 = scatter(x,Y,50,C,'filled');
saveas(image2,'image2.jpg','jpg');
figure(3);
image3 = scatter3(x,Y,Z,50,C,'filled');
saveas(image3,'image3.jpg','jpg');
quit force