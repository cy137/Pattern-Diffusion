function PatternDiffusion (ResultSetID,sigmaK,alpha,d)
ProcessedData = importdata(strcat(ResultSetID,'-ProcessedData.txt'),',');
X = ProcessedData;
D = L2_distance(X',X',1);
K = exp(-(D/sigmaK).^2);
p = sum(K);
p = p(:);
K1 = K./((p*p').^alpha);
v = sqrt(sum(K1));
v = v(:);
A = K1./(v*v');
if sigmaK >= 0.5
    thre = 1e-7;  
    M = max(max(A));
    A = sparse(A.*double(A>thre*M));
    [U,S,V] = svds(A,d+1);   %Sparse version.
    U = U./(U(:,1)*ones(1,d+1));
else
    [U,S,V] = svd(A,0);   %Full version.
    U = U./(U(:,1)*ones(1,size(U,1)));
end;
Y = U(:,2:d+1);
C = kmeans(X,2);
dlmwrite(strcat(ResultSetID,'-PatternDiffusionTweetCategories.txt'),C,'\n');
figure(1)
image1 = scatter(Y(:,1),Y(:,2),50,C,'filled');
saveas(image1,strcat(ResultSetID,'-Image-1.jpg'),'jpg');
quit force
