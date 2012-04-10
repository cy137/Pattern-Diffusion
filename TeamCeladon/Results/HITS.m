function HITS(ResultSetID)
ProcessedData = importdata(strcat(ResultSetID,'-UserAdjacencyGraph.txt'),',');
epsilon = 1e-8;
n = size(ProcessedData,1);
rowVector = 1/n*ones(1,n);
residual = 1;
x = rowVector;

while(residual >= epsilon)
   prevx = x;
   x = x * ProcessedData';
   x = x * ProcessedData;
   x = x/sum(x);
   residual = norm(x-prevx,1);
end
y = x * ProcessedData';
y = y/sum(y);

dlmwrite(strcat(ResultSetID,'-HITSAuthorityVector.txt'),x,'\n');
dlmwrite(strcat(ResultSetID,'-HITSHubVector.txt'),y,'\n');
figure(1)
image1 = bar(x);
saveas(image1,strcat(ResultSetID,'-Image-1.jpg'),'jpg');
figure(2)
image2 = bar(y);
saveas(image2,strcat(ResultSetID,'-Image-2.jpg'),'jpg');
quit force;