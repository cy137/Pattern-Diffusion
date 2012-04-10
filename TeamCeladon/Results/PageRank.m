function PageRank(ResultSetID)
ProcessedData = importdata(strcat(ResultSetID,'-UserAdjacencyGraph.txt'),',');

[n,n] = size(ProcessedData);
for j = 1:n
   L{j} = find(ProcessedData(:,j));
   c(j) = length(L{j});
end

p = .85;
delta = (1-p)/n;
pageRank = ones(n,1)/n;
prevPR = zeros(n,1);
cnt = 0;
while max(abs(pageRank-prevPR)) > .0001
   prevPR = pageRank;
   pageRank = zeros(n,1);
   for j = 1:n
      if c(j) == 0
         pageRank = pageRank + prevPR(j)/n;
      else
         pageRank(L{j}) = pageRank(L{j}) + prevPR(j)/c(j);
      end
   end
   pageRank = p*pageRank + delta;
   cnt = cnt+1;
end

dlmwrite(strcat(ResultSetID,'-PageRankVector.txt'),pageRank,'\n');
figure(1)
image1 = bar(pageRank);
saveas(image1,strcat(ResultSetID,'-Image-1.jpg'),'jpg');
quit force;